#include <stdio.h>
#include <curl/curl.h>
#include <gtk/gtk.h>
//gcc `pkg-config --cflags gtk+-3.0` -o VisualRequester requester-API.c `pkg-config --libs gtk+-3.0 libcurl` <<< pour compiler

typedef struct {
    GtkWidget *KeyEntry;
    GtkWidget *URIEntry;
} EntryData;

void on_RequestButton_Click(GtkWidget *widget, gpointer data) {
    EntryData *entryData = (EntryData *)data;

    GtkWidget *KeyEntry = entryData->KeyEntry;
    GtkWidget *URIEntry = entryData->URIEntry;

    const gchar *key = gtk_entry_get_text(GTK_ENTRY(KeyEntry));
    const gchar *URI = gtk_entry_get_text(GTK_ENTRY(URIEntry));

    //CURL
    CURL *curl;
    CURLcode res;

    curl_global_init(CURL_GLOBAL_DEFAULT);
    curl = curl_easy_init();

    if (curl) {
        struct curl_slist *headers = NULL;
        headers = curl_slist_append(headers, "X-API-Key: your_api_key"); // Example header
        headers = curl_slist_append(headers, "Authorization: Bearer your_token"); // Example header

        curl_easy_setopt(curl, CURLOPT_URL, URI);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);
        curl_easy_setopt(curl, CURLOPT_FOLLOWLOCATION, 1L);

        res = curl_easy_perform(curl);
        if (res != CURLE_OK) {
            fprintf(stderr, "Error: %s\n", curl_easy_strerror(res));
        }

        curl_easy_cleanup(curl);
        curl_slist_free_all(headers);
    }

    curl_global_cleanup();
}

int main(int argc, char* argv[]) {
    // GTK initialisation des éléments de la fenetre
    GtkWidget *fenetre_principale = NULL;
    GtkWidget *URIEntry = NULL;
    GtkWidget *KeyEntry = NULL;
    GtkTextBuffer *OutputText = NULL;
    GtkWidget *RequestButton = NULL;
    GtkBuilder *builder = NULL;
    GError *error = NULL;
    gchar *filename = NULL;

    gtk_init(&argc, &argv);
    // chargement du fichier .glade
    builder = gtk_builder_new();
    filename = g_build_filename("./visualApp.glade", NULL);

    gtk_builder_add_from_file(builder, filename, &error);
    g_free(filename);
    //affectation des éléments du fichier
    fenetre_principale = GTK_WIDGET(gtk_builder_get_object(builder, "Window"));
    URIEntry = GTK_WIDGET(gtk_builder_get_object(builder, "URIEntry"));
    KeyEntry = GTK_WIDGET(gtk_builder_get_object(builder, "KeyEntry"));
    RequestButton = GTK_WIDGET(gtk_builder_get_object(builder, "RequestButton"));
    OutputText = GTK_WIDGET(gtk_builder_get_object(builder, "OutputText"));


    //entrée dans la structure des pointeurs
    EntryData entryData;
    entryData.KeyEntry = KeyEntry;
    entryData.URIEntry = URIEntry;

    //création des signaux
    gtk_builder_connect_signals(builder, NULL);
    g_signal_connect(fenetre_principale, "destroy", G_CALLBACK(gtk_main_quit), NULL);
    g_signal_connect(RequestButton, "clicked", G_CALLBACK(on_RequestButton_Click), (gpointer)&entryData);

    gtk_widget_show_all(fenetre_principale);
    gtk_main();
}