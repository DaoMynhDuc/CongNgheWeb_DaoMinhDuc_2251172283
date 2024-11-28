<?php
include 'header.php';
include 'flowers.php';
?>
<main class="container mt-4">
    <h2>Bài viết</h2>
    <?php if (empty($flowers)): ?>
        <p>Không có bài viết nào.</p>
    <?php else: ?>
        <ol>
            <?php foreach ($flowers as $index => $flower): ?>
                <li class="flower-item">
                    <h3><?= ($index + 1) . ". " . htmlspecialchars($flower['name']) ?></h3>
                    <p><?= htmlspecialchars($flower['describe']) ?></p>
                    <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" class="flower-image">
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</main>
<?php include 'footer.php'; ?>
