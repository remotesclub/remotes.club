<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remotes.club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.5.0/pure-min.css">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/grid.css">
    <!--<![endif]-->
    <link rel="stylesheet" href="css/remotes.css"
</head>
<body>
<a href="https://github.com/remotesclub/remotes.club"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png"></a>
<div id="wrapper">
<div class="pure-g">
<div class="pure-u-1-1">
<h1>remotes.club</h1>

<p>A home for remote workers.</p>

<p>More interesting things to come. For now, join us in the  <a href="https://remotes.slack.com">Remotes Slack</a> (<a href="https://join.slack.com/t/remotes/shared_invite/enQtNDI1OTE4OTg2MzM4LWU1YzUyMzY1YTVkNmNiNWEwZTI1MWE3OTQ4ODA5MTQ2ZmVmNWE5NDg4ZmMxNmM4N2U4YzA3NDRlOWJkN2ZiNGI">Click here for an invite.</a>)
</p>

<p>If you'd like a remotes.club account, fill in the <a href="/request.php">account request form</a>.</p>

<p>There is a write-up on how this server works at <a href="https://rasmus.remotes.club/remotes.html">https://rasmus.remotes.club/remotes.html</a>.</p>

<h2>Members</h2>
<ul class="members">
<?php
$homedirs = array_filter(scandir("/home"), function($dir) {
  return !preg_match("/^\.|www/", $dir) && is_dir("/home/$dir");
});

$index_files = ["index.html", "index.htm", "index.php"];
foreach ($homedirs as $homedir) {
   $has_index = false;
   $last_update = 0;
   foreach ($index_files as $index_file) {
       $path = "/home/$homedir/web/$index_file";
       if (file_exists($path)) {
           $has_index = true;
           $mtime = filemtime($path);
           if ($mtime > $last_update) {
               $last_update = $mtime;
          }
       }
   }
   $updated_marker = $last_update > time() - 86400 ? "*" : "";
   $li_class = $has_index ? "active" : "deadbeat";
   print("<li data-last-update=\"$last_update\" class=\"$li_class\"><span><a href=\"https://$homedir.remotes.club\">$homedir</a></span> $updated_marker</li>\n");
}
?>
</ul>
<div class="footnotes">
<p>* Updated in the last 24 hours</p>
<p><span class="active">Bold</span> members have created an index page.</p>
</div>
</div>
</div>
</div>
</body>
</html>
