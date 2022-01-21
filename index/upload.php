<link rel="stylesheet" href="../css/upload-search.css" />
<script type="text/javascript" src="../js/uploadfile.js"></script>

<div class="row">
    <div class="col-xs-12 main-div">
        <form action="addnewdownload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="torrentname" placeholder="Human readable torrent name (Note: You cannot use '_' character!)" maxlength="50" /><br>
            <label for="file">Select torrent file</label>
            <input id="file" style="display: none;" type="file" name="torrentfile" /><br>
            <input type="submit" value="Start download" /></td>
        </form>
    </div>
</div>