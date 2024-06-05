<?php

// detruit la session
session_destroy();

// redirectione ver la page principal
header('Location: index.php?route=home');