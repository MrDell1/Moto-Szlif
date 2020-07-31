<div class='number'><span>2</span></div><h2>Krok drugi </h2>
        <span>Wypełnij formularz danymi swojej głowicy</span>
    </div>
<div id="form">  
    <div id="data">


            <form action="head_data_checker.php" method='POST'>
                <div class='data_text'>
                    <label for="mark">Marka auta:</label>
                    <input type="text" name="mark" id="mark" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="model">Model:</label>
                    <input type="text" name="model" id="model" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="year">Rok produkcji:</label>
                    <input type="number" name="year" id="year" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="capacity">Pojemność:</label>
                    <input type="number" name="capacity" id="capacity">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="fuel">Rodzaj paliwa:</label>
                    <select type="text" name="fuel" id="fuel">
                        <option value="pb">Benzyna</option>
                        <option value="diseal">Diseal</option>
                        <option value="gaz">LPG</option>
                    </select>
                </div>          
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="eng_num">Numer silnika:</label>
                    <input type="text" name="eng_num" id="eng_num">
                </div>
                <div style="clear:both"></div>
                <iv class='data_text'>
                    <label for="vin_num">Numer VIN:</label>
                    <input type="text" name="vin_num" id="vin_num">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <input type="submit" value="Następny krok">
                </div>
            </form>
        </div>
</div>