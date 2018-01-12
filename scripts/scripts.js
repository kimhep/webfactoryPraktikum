var source = document.getElementById("entry-template").innerHTML;
var template = Handlebars.compile(source);
var context = {
    navigation: "<nav class=\"navbar navbar-toggleable-md navbar-light bg-faded navbar-expand-sm\" role=\"navigation\">\n" +
    "            <button\n" +
    "                class=\"navbar-toggler\"\n" +
    "                type=\"button\"\n" +
    "                data-toggle=\"collapse\"\n" +
    "                data-target=\"#navbarTogglerDemo01\"\n" +
    "                aria-controls=\"navbarTogglerDemo01\"\n" +
    "                aria-expanded=\"false\"\n" +
    "                aria-label=\"Toggle navigation\">\n" +
    "                <span class=\"navbar-toggler-icon\"></span>\n" +
    "            </button>\n" +
    "            <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo01\">\n" +
    "                <ul class=\"nav navbar-nav navbar-left\">\n" +
    "                    <li><a class=\"nav-link\" href=\"index.php\">Startseite</a></li>\n" +
    "                    <li><a class=\"nav-link\"href=\"twitter.php\">Twitter</a></li>\n" +
    "                    <li class=\"dropdown\">\n" +
    "                        <a\n" +
    "                            class=\"nav-link dropdown-toggle\"\n" +
    "                            href=\"http://example.com\"\n" +
    "                            id=\"navbarDropdownMenuLink\"\n" +
    "                            data-toggle=\"dropdown\"\n" +
    "                            aria-haspopup=\"true\"\n" +
    "                            aria-expanded=\"false\">\n" +
    "                            Wochen\n" +
    "                        </a>\n" +
    "                        <ul class=\"dropdown-menu\">\n" +
    "                            <li><a class=\"nav-link\"href=\"woche1.php\">1. Woche</a></li>\n" +
    "                            <li><a class=\"nav-link\"href=\"woche2.php\">2. Woche </a></li>\n" +
    "                        </ul>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "        </nav>",
    head: "<head>\n" +
    "        <meta charset=\"UTF-8\">\n" +
    "        <meta charset=\"UTF-8\">\n" +
    "        <title>Kims Praktikum</title>\n" +
    "        <meta charset=\"utf-8\">\n" +
    "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n" +
    "        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\">\n" +
    "        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>\n" +
    "        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js\"></script>\n" +
    "        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\"></script>\n" +
    "        <link rel=\"stylesheet\" href=\"styles/main.css\">\n" +
    "    </head>",
    scripts: ""
};