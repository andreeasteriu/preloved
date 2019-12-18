<?php
$sPageName = "warehouses";
require_once(__DIR__ . '/../includes/db-connect.php');

session_start();

if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}
if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}
?>

<!-- **************************** warehouses SECTION ******************************** -->
<link rel="stylesheet" href="warehouses.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="body-warehouses">
    <h2 class="add-warehouse-title">Warehouses</h2>
    <section class="warehouses">

        <?php
        $stmt = $dbh->prepare("SELECT * FROM warehouses");
        if ($stmt->execute(array())) {
            while ($row = $stmt->fetch()) {

                echo '
    <div class="warehouse-container">
        <form  action="../includes/update.warehouses.inc.php" id="' . $row['idWarehouse'] . '" class="warehouses-about-container" method="post">

            <div class="info">
                <p><b>Warehouse ' . $row['idWarehouse'] . '</b> </p> 
                <p><b>Name</b> <input data-update="newName" type="text" data name="name" class="edit-inputs" maxlength="20" data-type="string" data-min="5" data-max="20" placeholder="Name" value="' . $row['nameWarehouse'] . '"></p>
                <p><b>Address</b> <input data-update="newAddress" type="text" data name="address" class="edit-inputs" maxlength="100" data-type="string" data-min="5" data-max="100" placeholder="Address" value="' . $row['addressWarehouse'] . '"></p>
                <input type="hidden" name="idWarehouse" value="' . $row['idWarehouse'] . '">
            </div>
            <div class="container-grid-buttons">
                <button>Update Product</button>
                <div class="clicker-delete" class="manage-plan" name="update"><a href="../includes/delete.warehouse.php?id=' . $row['idWarehouse'] . '" class="warehouses-delete-link"><img src="../graphics/delete.svg"></a></div>

            </div>
        </form>
        </div>';
            }
        }



        ?>
    </section>
    <section class="add-warehouse">
        <h2 class="add-warehouse-title">Add Warehouse</h2>
        <form id="upload-warehouse" class="add-warehouse-form" method="POST">
            <input class="add-warehouse-input" name="name" type="text" data-type="string" data-min="3" data-max="40" value="" placeholder="Name">
            <input class="add-warehouse-input" name="address" type="text" data-type="string" data-min="3" data-max="40" value="" placeholder="Address">
            <div id="error_message"></div>
            <button type="submit" class="add-warehouse-submit" id="btn_upload"><img src="../graphics/upload.svg"> Add Warehouse</button>
        </form>
    </section>
</div>







<script src="../validate.js"></script>
<script>
    /************************* warehouses SECTION ***************************** */
    // $('.edit-inputs').attr({
    //         'disabled': 'disabled'
    //     })
    //     .css("border", "none");
    // $('.btnUploadCreditCard').css("display", "none");

    /************************* Update warehouses ***************************** */
    var property_update_id = $(this).attr("data-id");
    $().ready(function() {
        $('.clicker').click(function() {
            $('.edit-inputs').each(function() {
                if ($(this).attr('disabled')) {
                    $(this).removeAttr('disabled');
                    $(this).css({
                        'background': 'none',
                        "border": "1px solid #e6e6e6",
                        'padding': '.5em'
                    });
                    $('.btnUploadCreditCard').css("display", "block");
                    $('.clicker').html("<img src='../graphics/save.svg'>");
                } else {
                    $(this).attr({
                        'disabled': 'disabled'
                    });
                    $(this).css("border", "none");
                    $('.btnUploadCreditCard').css("display", "none");
                    $('.clicker').html("<img src='../graphics/edit.svg'>");
                };

            });

        });
    });

    // $(document).on('blur', '.warehouses-about-container input', function(event) {
    //     event.preventDefault()
    //     // console.log($('#warehousesInfo').serialize())
    //     $.ajax({
    //             url: "../includes/update.warehouses.inc.php",
    //             method: "POST",
    //             data: $('.warehouses-about-container').serialize(), // create the form to be passed
    //             dataType: "JSON"
    //         })
    //         .done(function() {
    //             console.log('User has been updated')
    //         })
    // });

    $('form#upload-warehouse').submit(function(event) {
        event.preventDefault()
        var productFormData = new FormData(this)
        // console.log('test')
        console.log($('form').serialize())
        $.ajax({
                url: "../includes/insert.warehouse.php",
                method: "POST",
                data: $('#upload-warehouse').serialize(), // create the form to be passed
                dataType: "JSON"

            })
            .done(function(response) {

                if (response.status === 1) {
                    window.location = '../profile/warehouses.php'
                } else {
                    $('#error_message').text(response.message)
                }
                console.log(response)
            })
            .fail(function(fail) {
                $('#error_message').text(fail.message)
            })

    })
</script>


<?php require_once(__DIR__ . '/../footer/footer.php'); ?>