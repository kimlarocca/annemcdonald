<?php require_once('Connections/cms.php'); ?>
<?php
$pageID = 16;
$albumID = 594;
?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

mysqli_select_db($cms, $database_cms);
$query_Recordset1 = "SELECT * FROM photos WHERE albumID = " . $albumID . " ORDER BY photoSequence ASC";
$Recordset1 = mysqli_query($cms, $query_Recordset1) or die(mysqli_error($cms));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$query_currentPage = "SELECT * FROM cmsPages WHERE pageID = " . $pageID;
$currentPage = mysqli_query($cms, $query_currentPage) or die(mysqli_error($cms));
$row_currentPage = mysqli_fetch_assoc($currentPage);
$totalRows_currentPage = mysqli_num_rows($currentPage);

$query_websiteInfo = "SELECT * FROM cmsWebsites WHERE websiteID = " . $websiteID;
$websiteInfo = mysqli_query($cms, $query_websiteInfo) or die(mysqli_error($cms));
$row_websiteInfo = mysqli_fetch_assoc($websiteInfo);
$totalRows_websiteInfo = mysqli_num_rows($websiteInfo);
?>
<?php
$pageTitle = 'Matted Everglades Wildlife Photos';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta
            http-equiv="Content-Type"
            content="text/html; charset=UTF-8"
    />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
    >
    <!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $row_websiteInfo['firstName']; ?> <?php echo $row_websiteInfo['lastName']; ?> | <?php echo $row_currentPage['pageTitle']; ?></title>
    <!-- InstanceEndEditable -->
    <link
            rel="stylesheet"
            type="text/css"
            href="styles/Wicked.css"
    />
    <link
            rel="stylesheet"
            type="text/css"
            href="styles/styles.css"
    />
    <!-- InstanceBeginEditable name="head" -->
    <link
            rel="stylesheet"
            type="text/css"
            href="styles/masonry.css"
    />
    <!-- InstanceEndEditable -->
    <script src="scripts/modernizr.custom.js"></script>
</head>

<body>
<div class="container">
    <div class="hero">
        <div class="heroContent">
            <h1><?php echo $pageTitle; ?></h1>
        </div>
    </div>
    <div class="main clearfix">
        <nav
                id="menu"
                class="nav"
        >
            <ul>
                <li><a href="index.php">Home<br />Page</a></li>
                <li><a href="cloth-masks.php">Cloth Masks</br>& Lanyards</a></li>
                <li><a href="herbal-heat-packs.php">Herbal</br>Heat Packs</a></li>
                <li><a href="wildlife-photos.php">Everglades</br>Wildlife Photos</a></li>
                <li><a href="shell-ornaments.php">Shell</br>Ornaments</a></li>
                <li><a href="realestate.php">Real</br>Estate</a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- /container -->

<!-- main content -->
<div class="content">
    <!-- InstanceBeginEditable name="mainContent" -->
    <div class="main">
        <div
                class="masonry js-masonry"
                data-masonry-options='{ "isFitWidth": true }'
        >
            <?php do { ?>
                <div class="item">
                    <div class="overlay-item">
                        <div class="item-image">
                            <img src="http://4siteusa.com/uploads/<?php echo $row_Recordset1['file_name']; ?>"></div>
                        <?php if ($row_Recordset1['photoTitle'] != '') { ?>
                            <div class="item-title">
                                <h2><?php echo $row_Recordset1['photoTitle']; ?></h2>
                            </div>
                            <?php
                        }
                        if ($row_Recordset1['photoDescription'] != '') {
                            ?>
                            <p><?php echo $row_Recordset1['photoDescription']; ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
        </div>
    </div>
    <!-- InstanceEndEditable -->
</div>
<!-- footer -->
<div class="footer">
    <div class="wf_row">
        <div class="wf_column wf_two">
            <h2><a href="index.php">Home</a> | <a href="about.php">About Me</a> | <a href="listings.php">Listings</a> |
                <a href="search.php">Property Search</a> | <a href="localInfo.php">Local Info</a> |
                <a href="contact.php">Contact Me</a></h2>
            <p>Copyright &copy; <?php echo $row_websiteInfo['firstName']; ?> <?php echo $row_websiteInfo['lastName']; ?> <?php echo date("Y"); ?>, All Rights Reserved.</p>
            <p>Web Design by <a href="http://www.4siteusa.com">4 Site</a>.</p>
        </div>
        <div class="wf_column wf_two wf_text_right">
            <h2><?php echo $row_websiteInfo['companyName']; ?></h2>
            <p><?php echo $row_websiteInfo['iaddress']; ?></p>
            <?php if ($row_websiteInfo['iaddress2'] <> '') { ?>
                <p><?php echo $row_websiteInfo['iaddress2']; ?></p>
            <?php } ?>
            <p><?php echo $row_websiteInfo['phoneNumber']; ?></p>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- InstanceBeginEditable name="scripts" -->
<script
        type="text/javascript"
        src="scripts/masonry.pkgd.min.js"
></script>
<script
        type="text/javascript"
        src="scripts/imagesloaded.pkgd.min.js"
></script>
<script>
    $(document).ready(function () {
        // initiallize masonry
        var $container = $('.masonry').masonry();
        $container.imagesLoaded(function () {
            $container.masonry();
            $container.masonry('bindResize');
        });

        $container.masonry('bindResize');
    });
</script>
<!-- InstanceEndEditable -->
<script src="scripts/scripts.js"></script>
<script
        type="text/javascript"
        src="scripts/masonry.pkgd.min.js"
></script>
<script
        type="text/javascript"
        src="scripts/imagesloaded.pkgd.min.js"
></script>
<script>
    $(document).ready(function () {
        // initiallize masonry
        var $container = $('.masonry').masonry();
        $container.imagesLoaded(function () {
            $container.masonry();
        });
    });
</script>
</body>
                                           <!-- InstanceEnd --></html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($currentPage);

mysqli_free_result($websiteInfo);
?>
