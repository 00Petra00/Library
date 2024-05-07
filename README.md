## Library
A Library weboldal könyvek tárolására és kezelésére szolgál. Létrehozhatunk könyveket, módosíthatjuk azokat, lefordíthatjuk több nyelvre és törölhetjük is őket. A főoldalon keresztül szűrhetjük a könyveket műfaj és kulcsszavak alapján is.
- Az applikáció egy feladatleírás alapján készült, mely [ezen a linken](https://drive.google.com/file/d/1n1dEFA-F1V-AlrQWYiIlNGoJPqs0ngK7/view?usp=sharing) keresztül érhető el.

## Futtatási útmutató
- XAMPP [letöltése](https://www.apachefriends.org/download.html) és installálása
- Program elhelyezése ide: `C:\xampp\htdocs\library`
- XAMPP megnyitása, Apache és MySQL elindítása (Start)
- Böngészőn keresztül megnyitni: `localhost/library/public`
- Terminálba bevinni: `cd C:/xampp/htdocs/library`, aztán:
  - `php artisan migrate`
  - `php artisan migrate:fresh --seed`

## Rövid demonstráció
- Megtalálható ezen a [felvételen.](https://drive.google.com/file/d/1oxQlMcxkroaIhxRNGYd2LiYGxbEm0QPH/view?usp=sharing)
