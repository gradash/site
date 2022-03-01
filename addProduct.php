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
            <div class="headerName" text-align=left>
                Add Product
            </div>
            <div class="headerButton">
                <button type="submit" form="product_form">
                    SAVE
                </button>
                <button type="button" onclick="window.location.href='/';">
                    CANCEL
                </button>
            </div>
        </div>
        <hr>
    </header>

    <form id="product_form" action="/submit-product" method="POST">
        <p><label>SKU</label><input id="#sku" type="text" name="sku" /></p>
        <p><label>Name</label><input id="#name" type="text" name="name" /></p>
        <p><label>Price($)</label><input id="#price" type="text" name="price" /></p>

        <p><label>Type Switcher</label>
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
        <p><label>Size(MB)</label><input id="#size" type="text" name="size" /></p>
        <p>Please provide DVD size.</p>
    </div>

    <div id="form-Book" style="display: none;">
        <p><label>Weight(KG)</label><input id="#weight" type="text" name="weight" /></p>
        <p>Please provide book weight.</p>
    </div>

    <div id="form-Furniture" style="display: none;">
        <p><label>Height(CM)</label><input id="#height" type="text" name="height" /></p>
        <p><label>Width(CM)</label><input id="#width" type="text" name="width" /></p>
        <p><label>Length(CM)</label><input id="#length" type="text" name="length" /></p>
        <p>Please provide dimensions in HxWxL format.</p>
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

    <footer class="footer">
        <?php require_once "footer.php";?>
    </footer>
</body>

</html>