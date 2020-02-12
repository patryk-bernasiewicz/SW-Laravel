# SW API

- Aplikacja umożliwia rejestrację i logowanie
- Po zalogowaniu na konto użytkownika, można wygenerować sobie token umożliwiający pobieranie danych z API
- Zalogowanie na konto admina (domyślnie: `admin@admin.com : admin`) umożliwia odpalenie skryptu aktualizującego automatycznie bazę postaci ze swapi.co
- Odpytanie endpointa `api/characters` z użyciem headera `Authorization: Bearer {token}` umożliwia pobranie postaci  
  Podanie parametru `name` umożliwia pobranie danej postaci przy użyciu jej imienia.
- Zbudowane przy użyciu Laravel 6 oraz środowiska Homestead.

## Wersja live

Wersja live aplikacji znajduje się pod adresem [sw.patrykb.pl](https://sw.patrykb.pl).