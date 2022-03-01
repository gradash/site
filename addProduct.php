<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="headerContainer">
            <div class="headerName" text-align=left>Add Product</div>
            <div class="headerButton">
                <input type="submit" form="product_form" value="SAVE">
                <button type="button" onclick="window.location.href='/';">CANCEL</button>
            </div>
        </div>
        <hr>
    </header>

    <form id="product_form" action="/submit-product" method="POST">
        <p>SKU <input id="#sku" type="text" name="sku" /></p>
        <p>Name <input id="#name" type="text" name="name" /></p>
        <p>Price($) <input id="#price" type="text" name="price" /></p>

        <p>Type Switcher
            <select id="productType" name="productType">
                <option value="0">Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
        </p>
        <div id="type_container"></div>

    </form>
    <div id="form-0" style="display: none;"></div>

    <div id="form-DVD" style="display: none;">
        <p>Size(MB)<input id="#size" type="text" name="size" /></p>
    </div>

    <div id="form-Book" style="display: none;">
        <p>Weight(KG)<input id="#weight" type="text" name="weight" /></p>
    </div>

    <div id="form-Furniture" style="display: none;">
        <p>Height(CM)<input id="#height" type="text" name="height" /></p><br />
        <p>Width(CM)<input id="#width" type="text" name="width" /></p><br />
        <p>Length(CM)<input id="#length" type="text" name="length" /></p>
    </div>

    <script>
    function onFormTypeChange(typeId) {
        let formTpl = document.getElementById('form-' + typeId);
        document.getElementById('type_container').innerHTML = formTpl.innerHTML;
    };

    document.getElementById('productType').onchange = function() {
        onFormTypeChange(this.value);
    };
    </script>

    <footer>
        <?php require_once "footer.php";?>
    </footer>
</body>

</html>