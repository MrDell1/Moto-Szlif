<a href="profile.php?step=5" class="hover:font-semibold w-40 px-2 py-2">
    <p>Dodaj usługi</p>
</a>
<a href="profile.php?step=6" class="hover:font-semibold w-40 px-2 py-2">
    <p>Dodaj części</p>
</a>
<a href="profile.php?step=7" class="hover:font-semibold w-40 px-2 py-2">
    <p>Sprawdź zamówienia</p>
</a>
<a href="profile.php?step=8" class="hover:font-semibold w-40 px-2 py-2">
    <p>Użytkownicy</p>
</a>
<a href="logout.php" class="hover:font-semibold w-40 px-2 py-2">
    <p>Wyloguj</p>
</a>
<script>
    function toogleEdit(input, text) {
        document.getElementById(input).classList.toggle('hidden');
        document.getElementById(input).classList.toggle('flex');
        //document.getElementById(input).classList.add('flex');

        document.getElementById(text).classList.toggle('flex');
        document.getElementById(text).classList.toggle('hidden');
        //document.getElementById(text).classList.add('hidden');

    }
</script>