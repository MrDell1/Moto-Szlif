<div class='number'><span>1</span></div><h2>Krok pierwszy </h2>
        <span>Wypełnij formularz swoimi danymi</span>
    </div>
<div id="form">  
    <div id="data">


            <form action="data_checker.php" method='POST'>
                <div class='data_text'>
                    <label for="fname">Imię:</label>
                    <input type="text" name="fname" id="fname" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="lname">Nazwisko:</label>
                    <input type="text" name="lname" id="lname" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="tel_number">Numer telefonu:</label>
                    <input type="tel" name="tel" id="tel_number">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="country">Kraj:</label>
                    <select name="country" id="country">
                        <option value="">--</option><!----><option  value="AD"> Andora </option><option  value="AE"> Zjednoczone Emiraty Arabskie </option><option  value="AF"> Afganistan </option><option  value="AG"> Antigua i Barbuda </option><option  value="AI"> Anguilla </option><option  value="AL"> Albania </option><option  value="AM"> Armenia </option><option  value="AN"> Antyle Holenderskie </option><option  value="AO"> Angola </option><option  value="AR"> Argentyna </option><option  value="AS"> Samoa Amerykańska </option><option  value="AT"> Austria </option><option  value="AU"> Australia </option><option  value="AW"> Aruba </option><option  value="AZ"> Republika Azerbejdżanu </option><option  value="BA"> Bośnia i Hercegowina </option><option  value="BB"> Barbados </option><option  value="BD"> Bangladesz </option><option  value="BE"> Belgia </option><option  value="BF"> Burkina Faso </option><option  value="BG"> Bułgaria </option><option  value="BH"> Bahrajn </option><option  value="BI"> Burundi </option><option  value="BJ"> Benin </option><option  value="BM"> Bermuda </option><option  value="BN"> Brunei </option><option  value="BO"> Boliwia </option><option  value="BR"> Brazylia </option><option  value="BS"> Bahamy </option><option  value="BT"> Bhutan </option><option  value="BW"> Botswana </option><option  value="BY"> Białoruś </option><option  value="BZ"> Belize </option><option  value="CA"> Kanada </option><option  value="CD"> Kongo, Demokratyczna Republika </option><option  value="CF"> Republika Środkowoafrykańska </option><option  value="CG"> Kongo, Republika </option><option  value="CH"> Szwajcaria </option><option  value="CI"> Wybrzeże Kości Słoniowej </option><option  value="CK"> Wyspy Cooka </option><option  value="CL"> Chile </option><option  value="CM"> Kamerun </option><option  value="CN"> Chiny </option><option  value="CO"> Kolumbia </option><option  value="CR"> Kostaryka </option><option  value="CV"> Republika Zielonego Przylądka </option><option  value="CY"> Cypr </option><option  value="CZ"> Czechy </option><option  value="DE"> Niemcy </option><option  value="DJ"> Dżibuti </option><option  value="DK"> Dania </option><option  value="DM"> Dominika </option><option  value="DO"> Dominikana </option><option  value="DZ"> Algeria </option><option  value="EC"> Ekwador </option><option  value="EE"> Estonia </option><option  value="EG"> Egipt </option><option  value="EH"> Sahara Zachodnia </option><option  value="ER"> Erytrea </option><option  value="ES"> Hiszpania </option><option  value="ET"> Etiopia </option><option  value="FI"> Finlandia </option><option  value="FJ"> Fidżi </option><option  value="FK"> Falklandy </option><option  value="FM"> Mikronezja </option><option  value="FR"> Francja </option><option  value="GA"> Republika Gabonu </option><option  value="GB"> Wielka Brytania </option><option  value="GD"> Grenada </option><option  value="GE"> Gruzja </option><option  value="GF"> Gujana Francuska </option><option  value="GG"> Guernsey </option><option  value="GH"> Ghana </option><option  value="GI"> Gibraltar </option><option  value="GL"> Grenlandia </option><option  value="GM"> Gambia </option><option  value="GN"> Gwinea </option><option  value="GP"> Gwadelupa </option><option  value="GQ"> Gwinea Równikowa </option><option  value="GR"> Grecja </option><option  value="GT"> Gwatemala </option><option  value="GU"> Guam </option><option  value="GW"> Gwinea Bissau </option><option  value="GY"> Gujana </option><option  value="HK"> Hong Kong </option><option  value="HN"> Honduras </option><option  value="HR"> Chorwacja </option><option  value="HT"> Haiti </option><option  value="HU"> Węgry </option><option  value="ID"> Indonezja </option><option  value="IE"> Irlandia </option><option  value="IL"> Izrael </option><option  value="IN"> Indie </option><option  value="IQ"> Irak </option><option  value="IR"> Iran </option><option  value="IS"> Islandia </option><option  value="IT"> Włochy </option><option  value="JE"> Jersey </option><option  value="JM"> Jamajka </option><option  value="JO"> Jordan </option><option  value="JP"> Japonia </option><option  value="KE"> Kenia </option><option  value="KG"> Kirgistan </option><option  value="KH"> Kambodża </option><option  value="KI"> Kiribati </option><option  value="KM"> Komory </option><option  value="KN"> Saint Kitts i Nevis </option><option  value="KR"> Korea Południowa </option><option  value="KW"> Kuwejt </option><option  value="KY"> Kajmany </option><option  value="KZ"> Kazachstan </option><option  value="LA"> Laos </option><option  value="LC"> Saint Lucia </option><option  value="LI"> Liechtenstein </option><option  value="LK"> Sri Lanka </option><option  value="LT"> Litwa </option><option  value="LU"> Luksemburg </option><option  value="LV"> Łotwa </option><option  value="LY"> Liban </option><option  value="MA"> Maroko </option><option  value="MC"> Monako </option><option  value="MD"> Mołdawia </option><option  value="ME"> Czarnogóra </option><option  value="MG"> Madagaskar </option><option  value="MH"> Wyspy Marshalla </option><option  value="MK"> Macedonia </option><option  value="ML"> Mali </option><option  value="MM"> Birma </option><option  value="MN"> Mongolia </option><option  value="MO"> Makau </option><option  value="MQ"> Martynika </option><option  value="MR"> Mauretania </option><option  value="MS"> Montserrat </option><option  value="MT"> Malta </option><option  value="MU"> Mauritius </option><option  value="MV"> Malediwy </option><option  value="MW"> Malawi </option><option  value="MX"> Meksyk </option><option  value="MY"> Malezja </option><option  value="MZ"> Mozambik </option><option  value="NA"> Namibia </option><option  value="NC"> Nowa Kaledonia </option><option  value="NE"> Niger </option><option  value="NG"> Nigeria </option><option  value="NI"> Nikaragua </option><option  value="NL"> Holandia </option><option  value="NO"> Norwegia </option><option  value="NP"> Nepal </option><option  value="NR"> Nauru </option><option  value="NU"> Niue </option><option  value="NZ"> Nowa Zelandia </option><option  value="OM"> Oman </option><option  value="PA"> Panama </option><option  value="PE"> Peru </option><option  value="PF"> Polinezja Francuska </option><option  value="PG"> Papua-Nowa Gwinea </option><option  value="PH"> Filipiny </option><option  value="PK"> Pakistan </option><option selected  value="PL"> Polska </option><option  value="PM"> Saint-Pierre i Miquelon </option><option  value="PR"> Portoryko </option><option  value="PT"> Portugalia </option><option  value="PW"> Palau </option><option  value="PY"> Paragwaj </option><option  value="QA"> Katar </option><option  value="RO"> Rumunia </option><option  value="RS"> Serbia </option><option  value="RU"> Rosja </option><option  value="RW"> Rwanda </option><option  value="SA"> Arabia Saudyjska </option><option  value="SB"> Wyspy Salomona </option><option  value="SC"> Seszele </option><option  value="SE"> Szwecja </option><option  value="SG"> Singapur </option><option  value="SH"> Wyspa Świętej Heleny </option><option  value="SI"> Słowenia </option><option  value="SJ"> Svalbard </option><option  value="SK"> Słowacja </option><option  value="SL"> Sierra Leone </option><option  value="SM"> San Marino </option><option  value="SN"> Senegal </option><option  value="SO"> Somalia </option><option  value="SR"> Surinam </option><option  value="SV"> Salwador </option><option  value="SY"> Syria </option><option  value="SZ"> Suazi </option><option  value="TC"> Turks i Caicos </option><option  value="TD"> Czad </option><option  value="TG"> Togo </option><option  value="TH"> Tajlandia </option><option  value="TJ"> Tadżykistan </option><option  value="TM"> Turkmenistan </option><option  value="TN"> Tunezja </option><option  value="TO"> Tonga </option><option  value="TR"> Turcja </option><option  value="TT"> Trynidad i Tobago </option><option  value="TV"> Tuvalu </option><option  value="TW"> Tajwan </option><option  value="TZ"> Tanzania </option><option  value="UA"> Ukraina </option><option  value="UG"> Uganda </option><option  value="US"> Stany Zjednoczone </option><option  value="UY"> Urugwaj </option><option  value="UZ"> Uzbekistan </option><option  value="VA"> Watykan </option><option  value="VC"> Saint Vincent i Grenadyny </option><option  value="VE"> Wenezuela </option><option  value="VG"> Brytyjskie Wyspy Dziewicze </option><option  value="VI"> Wyspy Dziewicze (USA) </option><option  value="VN"> Wietnam </option><option  value="VU"> Vanuatu </option><option  value="WF"> Wallis i Futuna </option><option  value="WS"> Samoa Zachodnie </option><option  value="YE"> Jemen </option><option  value="YT"> Majotta </option><option  value="ZA"> Republika Południowej Afryki </option><option  value="ZM"> Zambia </option><option  value="ZW"> Zimbabwe </option>                    
                    </select> 
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="state">Województwo:</label>
                    <select name="state" id="state">
                        <option value="">--</option>
                        <option  value="PLDS">DOLNOŚLĄSKIE</option><option  value="PLKP">KUJAWSKO-POMORSKIE</option><option  value="PLLU">LUBELSKIE</option><option  value="PLLB">LUBUSKIE</option><option  value="PLMA">MAŁOPOLSKIE</option><option  value="PLMZ">MAZOWIECKIE</option><option  value="PLLD">ŁÓDZKIE</option><option  value="PLOP">OPOLSKIE</option><option  value="PLPK">PODKARPACKIE</option><option  value="PLPD">PODLASKIE</option><option  value="PLPM">POMORSKIE</option><option  value="PLSL">ŚLĄSKIE</option><option  value="PLSK">ŚWIĘTOKRZYSKIE</option><option  value="PLWN">WARMIŃSKO-MAZURSKIE</option><option  value="PLWP">WIELKOPOLSKIE</option><option  value="PLZP">ZACHODNIOPOMORSKIE</option>
                    </select>                
                </div>      
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="city">Miasto:</label>
                    <input type="text" name="city" id="city">
                </div>          
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="address">Adres:</label>
                    <input type="text" name="address" id="address">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="code">Kod pocztowy:</label>
                    <input type="text" name="code" id="code">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <input type="submit" value="Następny krok">
                </div>
            </form>
        </div>
</div>