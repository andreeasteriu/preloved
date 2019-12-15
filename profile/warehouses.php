<?php
$sPageName = "Profile";
require_once(__DIR__ . '/../includes/db-connect.php');

session_start();

if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}
if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}
?>

<!-- **************************** PROFILE SECTION ******************************** -->
<link rel="stylesheet" href="profile.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="body-profile">
    <section class="profile">
        <?php
        $stmt = $dbh->prepare("SELECT * FROM warehouses");
        if ($stmt->execute(array())) {
            while ($row = $stmt->fetch()) {

                echo '
<div class="warehouse-container">
        <form id="' . $row['idWarehouse'] . '" class="profile-about-container" method="post">

            <div class="info">
                <p><b>Warehouse ' . $row['idWarehouse'] . '</b> </p> 
                
                <p><b>Address</b> <input data-update="newAddress" type="text" name="address" class="edit-inputs" maxlength="100" data-type="string" data-min="5" data-max="100" placeholder="Address" value="' . $row['addressWarehouse'] . '"></p>
                <input type="hidden" name="idWarehouse" value="' . $row['idWarehouse'] . '">
            </div>
            <div class="container-grid-buttons">
                <div class="clicker" class="manage-plan" name="update"><img src="../graphics/edit.svg">Manage</div>
                <div class="clicker-delete" class="manage-plan" name="update"><a href="../includes/delete.warehouse.php?id=' . $row['idWarehouse'] . '" class="profile-delete-link"><img src="../graphics/delete.svg"></a></div>

            </div>
        </form>
        </div>';
            }
        }



        ?>
</div>
<section class="sell-your-clothes">
    <h2 class="sell-your-clothes-title">Add Warehouse</h2>
    <form id="upload-clothes-form" class="sell-your-clothes-form" method="POST">
        <input class="sell-your-clothes-input" name="address" type="text" data-type="string" data-min="3" data-max="40" value="" placeholder="Title">
        <button type="submit" class="sell-your-clothes-submit" onclick="return uploadCheck(this);" id="btn_upload"><img src="../graphics/upload.svg"> Add Warehouse</button>
    </form>
</section>








<script src="../validate.js"></script>
<script>
    /************************* PROFILE SECTION ***************************** */
    $('.edit-inputs').attr({
            'disabled': 'disabled'
        })
        .css("border", "none");
    $('.btnUploadCreditCard').css("display", "none");

    /************************* Update profile ***************************** */
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
                    $('.clicker').html("<img src='../graphics/edit.svg'>Save");
                } else {
                    $(this).attr({
                        'disabled': 'disabled'
                    });
                    $(this).css("border", "none");
                    $('.btnUploadCreditCard').css("display", "none");
                    $('.clicker').html("<img src='../graphics/edit.svg'>Manage");
                };

            });

        });
    });

    $(document).on('blur', '.profile-about-container input', function(event) {
        event.preventDefault()
        // console.log($('#profileInfo').serialize())
        $.ajax({
                url: "../includes/update.warehouses.inc.php",
                method: "POST",
                data: $('.profile-about-container').serialize(), // create the form to be passed
                dataType: "JSON"
            })
            .done(function() {
                console.log('User has been updated')
            })
    });

    $('form#upload-clothes-form').submit(function(event) {
        event.preventDefault()
        var productFormData = new FormData(this)
        // console.log('test')
        // console.log($('form').serialize())
        $.ajax({
                url: "../includes/insert.warehouse.php",
                method: "POST",
                data: $('#upload-clothes-form').serialize(), // create the form to be passed
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