#include <gtk/gtk.h>
#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>
#include <jansson.h>

const gchar *apiValue = NULL;
const gchar *keyvalue = NULL;
const gchar *elementvalue = NULL;

typedef struct {
    GtkWidget * textOutput;
    GtkTextBuffer * buffer;
}Data;

json_t *extractValueFromJsonByKey(json_t *jsonRoot, const char *searchKey) {
    if(searchKey == NULL){
        return jsonRoot;
    }
    json_t *result = NULL;

    if (jsonRoot && json_is_object(jsonRoot)) {
        const char *key;
        json_t *value;

        json_object_foreach(jsonRoot, key, value) {
            if (strcmp(key, searchKey) == 0) {
                result = value;
                break;
            }

            if (json_is_object(value) || json_is_array(value)) {
                result = extractValueFromJsonByKey(value, searchKey);
                if (result) {
                    break;
                }
            }
        }
    }

    return result;
}

size_t write_callback(void *ptr, size_t size, size_t nmemb, char *output) {
    size_t total_size = size * nmemb;
    strncat(output, ptr, total_size);
    return total_size;
}

char * indentJsonString(const char* jsonString) {
    int jsonStringLength = strlen(jsonString);
    char* indentedJsonString = (char*)malloc((jsonStringLength * 2 + 1) * sizeof(char)); // Allocation de mémoire pour la chaîne indentée
    int indentLevel = 0;
    int currentPosition = 0;
    int indentSize = 4;
    for (int i = 0; i < jsonStringLength; i++) {
        if (jsonString[i] == '{' || jsonString[i] == '[') {

            indentedJsonString[currentPosition++] = jsonString[i];
            indentedJsonString[currentPosition++] = '\n';
            indentLevel++;

            for (int j = 0; j < indentLevel * indentSize; j++) {
                indentedJsonString[currentPosition++] = ' ';
            }
        } else if (jsonString[i] == '}' || jsonString[i] == ']') {
            indentedJsonString[currentPosition++] = '\n';
            indentLevel--;

            for (int j = 0; j < indentLevel * indentSize; j++) {
                indentedJsonString[currentPosition++] = ' ';
            }

            indentedJsonString[currentPosition++] = jsonString[i];
        } else if (jsonString[i] == ',') {
            indentedJsonString[currentPosition++] = jsonString[i];
            indentedJsonString[currentPosition++] = '\n';

            for (int j = 0; j < indentLevel * indentSize; j++) {
                indentedJsonString[currentPosition++] = ' ';
            }
        } else {
            indentedJsonString[currentPosition++] = jsonString[i];
        }
    }

    indentedJsonString[currentPosition] = '\0';

    return indentedJsonString;
}

static void download_output(GtkWidget *widget,
                            gpointer   data)
{
    Data *viewData = (Data *)data;

    GtkTextBuffer *buffer = viewData->buffer;
    GtkWidget *textOutput = viewData->textOutput;
    GtkTextIter start, end;
    gchar *text;

    gtk_text_buffer_get_bounds(buffer, &start, &end);
    text = gtk_text_buffer_get_text(buffer, &start, &end, FALSE);


    printf("hello world\n");
    fflush(stdout);
    FILE *outputfile = fopen("Output.txt", "w");

    if (outputfile) {
        fprintf(outputfile, "%s", text);

        // Ferme le fichier
        fclose(outputfile);
    } else {
        printf("Impossible d'ouvrir le fichier.\n");
    }
}

static void print_output (GtkWidget *widget,
             gpointer   data)
{
    Data *viewData = (Data *)data;

    GtkTextBuffer *buffer = viewData->buffer;
    GtkWidget *textOutput = viewData->textOutput;

    CURL *curl;
    CURLcode res;
    curl_global_init(CURL_GLOBAL_DEFAULT);
    curl = curl_easy_init();
    char *output = malloc(sizeof(char) * 16384);
    output[0] = '\0';  // Initialize the output buffer

    if (curl) {

        struct curl_slist *headers = NULL;
        char *header = malloc(sizeof(char) * 267);
        sprintf(header, "X-API-Key: %s", keyvalue);

        headers = curl_slist_append(headers, header);
        sprintf(header, "Authorization: Bearer %s", keyvalue);
        headers = curl_slist_append(headers, header);
        free(header);

        curl_easy_setopt(curl, CURLOPT_URL, apiValue);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);
        curl_easy_setopt(curl, CURLOPT_FOLLOWLOCATION, 1L);

        // Set the callback function and pass the output buffer as userdata
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, write_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, output);

        res = curl_easy_perform(curl);
        if (res != CURLE_OK) {
            fprintf(stderr, "Error: %s\n", curl_easy_strerror(res));
        } else {
            json_t *value = extractValueFromJsonByKey(json_loads(output, 0, NULL), elementvalue);
            if (value != NULL) {
                char *valueString = json_dumps(value, JSON_ENCODE_ANY);
                gtk_text_buffer_set_text(buffer, indentJsonString(valueString), -1);
                free(valueString);
            } else {
                gtk_text_buffer_set_text(buffer, indentJsonString(output), -1);
            }

            gtk_widget_queue_draw(textOutput);
        }

        curl_easy_cleanup(curl);
        curl_slist_free_all(headers);
    }

    curl_global_cleanup();

    free(output);
}

void on_api_changed(GtkEntry *entry, gpointer data) {
    apiValue = gtk_entry_get_text(entry);
    //printf("%s\n", apiValue);
    //fflush(stdout);
}
void on_key_changed(GtkEntry *entry, gpointer data) {
    keyvalue = gtk_entry_get_text(entry);
    //printf("%s\n", keyvalue);
    //fflush(stdout);
}
void on_element_changed(GtkEntry *entry, gpointer data){
    elementvalue = gtk_entry_get_text(entry);
    //printf("%s\n", elementvalue);
    //fflush(stdout);
}


int main (int   argc,
      char *argv[])
{
    GtkBuilder *builder;
    GObject *window;
    GObject *button;
    GObject *download;
    GtkWidget *APIEntry;
    GtkWidget *KeyEntry;
    GtkWidget *ElementEntry;
    GtkWidget *textOutput;
    GtkTextBuffer *buffer;
    GError *error = NULL;

    gtk_init (&argc, &argv);

    /* Construct a GtkBuilder instance and load our UI description */
    builder = gtk_builder_new ();
    if (gtk_builder_add_from_file (builder, "builder.ui", &error) == 0)
    {
        g_printerr ("Error loading file: %s\n", error->message);
        g_clear_error (&error);
        return 1;
    }

    /* Connect signal handlers to the constructed widgets. */
    window = gtk_builder_get_object (builder, "window");
    g_signal_connect (window, "destroy", G_CALLBACK (gtk_main_quit), NULL);


    APIEntry = GTK_WIDGET(gtk_builder_get_object(builder, "APIEntry"));
    g_signal_connect(APIEntry, "changed", G_CALLBACK(on_api_changed), (gpointer ) NULL);

    KeyEntry = GTK_WIDGET(gtk_builder_get_object(builder, "KeyEntry"));
    g_signal_connect(KeyEntry, "changed", G_CALLBACK(on_key_changed), (gpointer ) NULL);

    ElementEntry = GTK_WIDGET(gtk_builder_get_object(builder, "ElementEntr"));
    g_signal_connect(ElementEntry, "changed", G_CALLBACK(on_element_changed), (gpointer ) NULL);


    textOutput = GTK_WIDGET(gtk_builder_get_object(builder, "textOutput"));
    buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(textOutput));
    Data data;
    data.textOutput = textOutput;
    data.buffer = buffer;


    button = gtk_builder_get_object (builder, "button");
    g_signal_connect(button, "clicked", G_CALLBACK(print_output), &data);


    download = gtk_builder_get_object (builder, "Download");
    g_signal_connect(download, "clicked", G_CALLBACK(download_output), &data);

    gtk_main ();

    return 0;
}
