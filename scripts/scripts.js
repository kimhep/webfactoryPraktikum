var source = document.getElementById("entry-template").innerHTML;
var template = Handlebars.compile(source);
var context = {
    html: "<div class=\"jumbotron\">\n" +
    "                <h1>Mein Praktikumsbericht</h1>\n" +
    "                <p>Auf dieser Webiste kannst du sehen, wie ich mit Hilfe von \"bootstrap\" meine Website verbessert habe.</p>\n" +
    "\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"tab-content\">\n" +
    "                <div id=\"home\" class=\"container tab-pane active\"><br>\n" +
    "                    <h3>Die 1 Woche</h3>\n" +
    "                    <p>Mein Praktikum bei der <a href=\"https://www.webfactory.de\">Webfactory GmbH</a>, die sich mit Websiten und Webanwendung beschäftigt.</p>\n" +
    "                </div>\n" +
    "                <div id=\"menu1\" class=\"container tab-pane fade\"><br>\n" +
    "                    <h3>Erste Woche</h3>\n" +
    "                    <p></p>\n" +
    "                    <footer>Website von Kim</footer>\n" +
    "                </div>\n" +
    "                <div id=\"menu2\" class=\"container tab-pane fade\"><br>\n" +
    "                    <h3>Zweite Woche</h3>\n" +
    "                    <p></p>\n" +
    "                    <footer>Website von Kim</footer>\n" +
    "                </div>\n" +
    "                <div id=\"menu3\" class=\"container tab-pane fade\"><br>\n" +
    "                    <h3>Twitter</h3>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>"
};