<?php
    $defaultBricks = array("content", "accordion", "columns", "alert", "image", "panel", "carousel", "image-caption", "button");
    $excludeBricks = $this->excludeBricks;
    $extraBricks = $this->extraBricks;
    $name = $this->name; if(!$this->name) $this->name = "default";
    $params = array();

    $bricks = $defaultBricks;

    foreach($excludeBricks as $brick)
    {
        if(in_array($brick, $bricks))
        {
            $bricks = array_diff($bricks, array($brick));
        }
    }

    foreach($extraBricks as $brick)
    {
        if(!in_array($brick, $bricks))
        {
            $bricks[] = $brick;
        }
    }

    foreach($bricks as $brick)
    {
        $params[$brick] = array(
            "forceEditInView" => true
        );
    }

?>

<?php echo $this->areablock("c" . $name, array(
        "allowed" => $bricks,
        "params" => $params
    ));
?>
