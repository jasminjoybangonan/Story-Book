<?php
// Storybook data (array of chapters)
$chapters = [
    "Book" => "Short Story",
    "Chapter 1" => "Once upon a time in a quiet village, there lived a curious child named Alexander.",
    "Chapter 2" => "Alexander loved exploring the forest, where he would hear the sound of birds singing: tweet, tweet!",
    "Chapter 3" => "One day, he discovered a hidden cave. Inside, he found a glowing crystal of mystery.",
    "Chapter 4" => "The crystal whispered his name: Alexander... but then it called him Alex, his nickname.",
    "Chapter 5" => "With courage, Alex stepped forward and began his adventure into the unknown.",
    "The END" => "To be continued"
];

// Images for each chapter
$images = [
    "Book" => "Cover.png",
    "Chapter 1" => "Village.png",
    "Chapter 2" => "Forest.png",
    "Chapter 3" => "Cave.png",
    "Chapter 4" => "crystal.png",
    "Chapter 5" => "Adventure.png"
];

// Apply string manipulations 
foreach ($chapters as $key => &$story) {
    // 1 + 2
    $story = str_replace("Alexander", strtoupper("Alexander"), $story); 
    // 3
    $story = str_replace("tweet, tweet!", strtolower("TWEET, TWEET!"), $story); 
    
    if ($key === "Chapter 4") {
        $story .= " (His short name is: " . substr("Alexander", 0, 4) . ")"; // 4
        $story .= " (Name length: " . strlen("Alexander") . ")"; // 5
    }
    if ($key === "Chapter 3") {
        $story .= " " . str_repeat("BOOM! ", 3); // 6
    }
    if ($key === "Chapter 5") {
        $story .= " (Secret code: " . strrev("Adventure") . ")"; // 7
        $story .= " (Last 3 letters: " . substr("Adventure", -3) . ")"; // 8
    }

    $words = explode(" ", $story); // 9
    $story = implode(" ", $words); // 10

    $story = ucfirst($story); // 11
}
unset($story);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Interactive Storybook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center-wrap">
        <div class="book" id="book">
            <?php
            $i = 1;
            $total = count($chapters);
            foreach ($chapters as $title => $text):
                $z = $total - $i; // stack pages
            ?>
                <div class="page" id="page-<?php echo $i; ?>" style="z-index: <?php echo $z + 100; ?>;">
                    <h1><?php echo htmlspecialchars($title); ?></h1>
                    <p><?php echo nl2br(htmlspecialchars($text)); ?></p>

                    <?php if (isset($images[$title])): ?>
                        <img src="images/<?php echo $images[$title]; ?>" 
                             alt="<?php echo htmlspecialchars($title); ?>" 
                             class="page-img">
                    <?php endif; ?>
                </div>
            <?php
                $i++;
            endforeach;
            ?>
        </div>

        <div class="controls">
            <button class="btn" id="prevBtn">◀ Previous</button>
            <button class="btn" id="nextBtn">Next ▶</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
