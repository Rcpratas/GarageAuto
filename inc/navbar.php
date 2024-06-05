<nav class="container mt-5 p-4 border rounded-3 shadow-sm bg-light">
    <div class="row align-items-center">
        <div class="col">
            <h4>Garage Vincent Parrot</h4>
        </div>

        <div class="col text-center">
            <a href="?route=home">Home</a>
            <span class="mx-2">|</span>
            <a href="?route=page1">Page 1</a>
            <span class="mx-2">|</span>
            <a href="?route=page2">Page 2</a>
            <span class="mx-2">|</span>
            <a href="?route=page3">Page 3</a>
        </div>

        <div class="col text-end">
            <span>User connecté: <strong><?= $_SESSION['user']->user ?></strong></span>
            <span class="mx-2">|</span>
            <a href="?route=logout">Sortir</a>
        </div>
    </div>
</nav>