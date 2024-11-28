<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bài Thi Trắc Nghiệm</title>
    <style>
        .question {
            margin-bottom: 20px;
        }

        .options p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Bài Thi Trắc Nghiệm</h1>
        <form action="ketqua.php" method="POST">
            <?php
            require_once 'connection.php'; // Ket noi csdl

            // Lay du lieu tu csdl
            $sql = "SELECT * FROM quizz";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $questionIndex = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="question">';
                    echo '<p><strong>Câu hỏi ' . $questionIndex . ':</strong> ' . htmlspecialchars($row['question']) . '</p>';
                    echo '<div class="options">';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="answer[' . $questionIndex . ']" value="A">';
                    echo '<label class="form-check-label" for="q' . $questionIndex . 'A">' . htmlspecialchars($row['option_a']) . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="answer[' . $questionIndex . ']" value="B">';
                    echo '<label class="form-check-label" for="q' . $questionIndex . 'B">' . htmlspecialchars($row['option_b']) . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="answer[' . $questionIndex . ']" value="C">';
                    echo '<label class="form-check-label" for="q' . $questionIndex . 'C">' . htmlspecialchars($row['option_c']) . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="answer[' . $questionIndex . ']" value="D">';
                    echo '<label class="form-check-label" for="q' . $questionIndex . 'D">' . htmlspecialchars($row['option_d']) . '</label>';
                    echo '</div>';
                    echo '</div>';
                    echo '<input type="hidden" name="correct_answer[' . $questionIndex . ']" value="' . htmlspecialchars($row['answer']) . '">';
                    echo '</div>';
                    $questionIndex++;
                }
            } else {
                echo "<p>Không có câu hỏi trong cơ sở dữ liệu!</p>";
            }
            ?>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Nộp bài</button>
            </div>
        </form>
    </div>
</body>

</html>
