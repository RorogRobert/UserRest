# UserRest
<b>Symfony 4.4</b> okrojona wersja <b>skeleton</b> świetnie nadająca się na mikroserwisy, aplikacje konsolowe, API itp.

Obsługa użytkowników jedynie za pomocą REST'owego kontrolera.

API przyjmuje i zwraca dane w formacie JSON.

Dodanie pierwszego użytkownika dostępne po zakomentowaniu autoryzacji dla głównej ścieżki aplikacji. 


plik: security.yml
    
        access_control:
            # - { path: ^/, roles: ROLE_USER }
            
            
Po dodaniu pierwszego użytkownika i przypisaniu mu tokena można logować się po tokenie włączając z powrotem dostęp tylko dla zalogowanego użytkownika.

-----

Aplikacja jest w wersji minimalistycznej.             