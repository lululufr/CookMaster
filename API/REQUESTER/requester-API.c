#include <gtk/gtk.h>
#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>

const gchar *apiValue = NULL;
const gchar *keyvalue = NULL;

typedef struct {
    GtkWidget * textOutput;
    GtkTextBuffer * buffer;
}Data;

size_t write_callback(void *ptr, size_t size, size_t nmemb, char *output) {
    size_t total_size = size * nmemb;
    // Append the received data to the output buffer
    strncat(output, ptr, total_size);
    return total_size;
}

static void print_hello (GtkWidget *widget,
             gpointer   data)
{
    Data *viewData = (Data *)data;

    GtkTextBuffer *buffer = viewData->buffer;
    GtkWidget *textOutput = viewData->textOutput;

    CURL *curl;
    CURLcode res;
    char *key = "8299dbe30a5a5362b7e24b8adf23b20d";
    curl_global_init(CURL_GLOBAL_DEFAULT);
    curl = curl_easy_init();
    char *output = malloc(sizeof(char) * 8192);
    output[0] = '\0';  // Initialize the output buffer



    if (curl) {
        struct curl_slist *headers = NULL;
        char * header = malloc(sizeof (char )*267);
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
            gtk_text_buffer_set_text(buffer, output, -1);

            gtk_widget_queue_draw(textOutput);
        }

        curl_easy_cleanup(curl);
        curl_slist_free_all(headers);
    }

    curl_global_cleanup();

    free(output); // Free the allocated memory for output
}

void on_api_changed(GtkEntry *entry, gpointer data) {
    apiValue = gtk_entry_get_text(entry);
}
void on_key_changed(GtkEntry *entry, gpointer data) {
    keyvalue = gtk_entry_get_text(entry);
}

int main (int   argc,
      char *argv[])
{
    GtkBuilder *builder;
    GObject *window;
    GObject *button;
    GtkWidget *APIEntry;
    GtkWidget *KeyEntry;
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

    textOutput = GTK_WIDGET(gtk_builder_get_object(builder, "textOutput"));
    buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(textOutput));
    Data data;
    data.textOutput = textOutput;
    data.buffer = buffer;

    button = gtk_builder_get_object (builder, "button");

    g_signal_connect(button, "clicked", G_CALLBACK(print_hello), &data);


    gtk_main ();

    return 0;
}
