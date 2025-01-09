Biļešu serviss PHP - Instalācija
Lai uzstādītu šo PHP balstīto biļešu servisu uz sava datora, seko šiem soļiem:
1. Lejupielādē vai noklonē projektu
Vispirms noklonē šo GitHub repozitoriju uz sava datora vai lejupielādē to kā ZIP failu. https://github.com/Keython/ticket_service_php
2. Ievieto projekta failus uz XAMPP servera
Ja izmanto XAMPP (vai citu PHP serveri), pārvieto noklonētos failus uz XAMPP htdocs direktoriju. Iepriekš jābūt instalētam PHP serverim ar MySQL atbalstu. 
•	Windows lietotājiem: C:\xampp\htdocs\
•	Mac lietotājiem: /Applications/XAMPP/htdocs/
•	Linux lietotājiem: /opt/lampp/htdocs/
Pārliecinies, ka visiem failiem ir piekļuve caur localhost serveri.
3. Palaid XAMPP serveri
•	Atver XAMPP Control Panel un startē Apache un MySQL serverus.
•	Apache serveris nodrošinās PHP izpildi, bet MySQL būs nepieciešams datu bāzes pārvaldībai.
4. Izveido datu bāzi
Lai projekts varētu pareizi darboties, jāizveido datu bāze, kurā tiks saglabāti biļešu dati.
•	Atver phpMyAdmin savā pārlūkprogrammā.
•	Izveido jaunu datu bāzi, piemēram, nosauc to par ticket_service.
•	Importē datu bāzes struktūru, kas atrodas projekta failos, izmantojot phpMyAdmin importēšanas funkciju.
5. Konfigurē datu bāzes savienojumu
Pielāgo savienojuma iestatījumus projektā, ja nepieciešams.
•	Atver failu, kur konfigurēta datu bāze (piemēram, config.php vai db_connection.php).
•	Pielāgo šos datus, ja nepieciešams:
$host = 'localhost';
$username = 'root';
$password = ''; // Atstāj tukšu XAMPP gadījumā
$database = 'ticket_service';
6. Pārbaudi vietējo serveri
Kad pabeigta uzstādīšana, atver pārlūkprogrammu un dodas uz localhost. Piemēram:
http://localhost/ticket_service_php/
Lai pārvaldītu datu bāzi, dodas uz : http://localhost/phpmyadmin/ 
