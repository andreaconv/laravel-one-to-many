# **Laravel Boolfolio - Base**

## CONSEGNA 

Creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti. <br>
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.

Descrizione: <br>
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.
Separamo gli ambienti Guest da quelli Admin per quanto riguarda stili, js, controller, viste e layout come abbiamo visto in classe. <br>
Per ora è importante avere gli ambienti puliti e separati e non preoccupatevi che siano “belli”. L’importante è che tutto il flusso, sia guest che admin funzioni correttamente.

---

se si scarica il progetto lanciare il comando `php artisan storage:link`

---
## STEPS per aggiungere l'immagine nel create
1. aggiungere nel form `enctype="multipart/form-data"`
2. aggiungere l'input col `type="file"` e il `name="image"`
3. nel controller nello `store()` verifico che la chiave iamge esiste 
```
if(array_key_exists('image', $form_data)){

  // prima di salvare l'immagine salvo il nome
  $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
  // salvo l'immagine nella cartella uploads e in $form_data['image_path'] salvo il percorso
  $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
}
```
4. creare le colonne nel migrate 
5. ricordarsi di aggiungere nel fillable i due cambi inseriti
6. per vederla nella show richiamo il metodo asset()
```
<img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->name }}">
```

>EXTRA 

se si vuole salvare anche il nome scrivere `Storage::putFileAs('uploads', $form_data['image'], 'nomeimmagine')`

## CONSEGNA 2

continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità **Type**. Questa entità rappresenta la tipologia di progetto ed è in relazione **one to many** con i progetti. 

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella `types`
- creare il model `Type`
- creare la migration di modifica per la tabella `projects` per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione

>Bonus 1: 

creare il seeder per il model Type e il seeder della tabella ‘projects’ con l’id del type (random) in relazione

>Bonus 2:

aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
