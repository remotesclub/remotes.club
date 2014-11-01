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

<p>More interesting things to come. For now, visit us on <a href="irc://irc.freenode.net/%23%23remotes">##remotes on freenode</a>.</p>

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
  $last_update = array_reduce($index_files, function($carry, $index_file) use ($homedir) {
    $path = "/home/$homedir/web/$index_file";
    if (file_exists($path)) {
      $mtime = filemtime($path);
      if ($mtime > $carry) {
        return $mtime;
      } else {
        return $carry;
      }
    } else {
      return $carry;
    }
  }, 0);

  $updated_marker = $last_update > time() - 86400 ? "*" : "";

  print("<li data-last-update=\"$last_update\"><span><a href=\"https://$homedir.remotes.club\">$homedir</a></span> $updated_marker</li>\n");
}
?>
</ul>
<p><small>* Updated in the last 24 hours</small></p>
</div>
</div>
</div>
</body>
</html>
