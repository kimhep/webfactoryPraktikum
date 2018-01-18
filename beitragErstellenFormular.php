<?php include("head.html");?>

<body>
<style>

    .btn-primary {
        background-color: #6233a0;
        border: #6233a0 ;
    }
    .btn-primary:hover {
        background-color: dimgrey;
        border: dimgrey;
    }
     .jumbotron {
         color: #6233a0;
     }

</style>
<?php include ("navigation.php")?>
    <div class="jumbotron orange-font">
        <h1>Mein Praktikumsbericht - Beitrag erstellen</h1>

        <form id="beitragForm" action="./beitragSpeichern.php" method="post">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Titel</label>
                    <input type="text" class="form-control" name="titel" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titel" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Teaser</label>
                    <textarea class="form-control" name="teaser" id="exampleTextarea" rows="3" placeholder="Text" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Text</label>
                    <textarea class="form-control" name="text" id="exampleTextarea" rows="3" placeholder="Text" required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </div>
</body>
