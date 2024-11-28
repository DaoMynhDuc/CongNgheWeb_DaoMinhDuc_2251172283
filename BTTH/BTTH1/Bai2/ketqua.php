<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kết Quả Bài Thi</title>
    <style>
        .result {
            margin-top: 30px;
            text-align: center;
        }

        .back-button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Kết Quả Bài Thi</h1>
        <?php
        // Kiểm tra phương thức yêu cầu là POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userAnswers = $_POST['answer'] ?? []; // Câu trả lời của người dùng
            $correctAnswers = $_POST['correct_answer'] ?? []; // Đáp án đúng

            $totalQuestions = count($correctAnswers); // Tổng số câu hỏi
            $correctCount = 0; // Số câu trả lời đúng

            // Tính số câu đúng
            foreach ($correctAnswers as $index => $correctAnswer) {
                $userAnswer = $userAnswers[$index] ?? ''; // Câu trả lời của người dùng
                if ($userAnswer === $correctAnswer) {
                    $correctCount++;
                }
            }

            // Hiển thị kết quả
            echo '<div class="result">';
            echo '<h2>Bạn đã trả lời đúng <strong>' . $correctCount . '</strong> trên tổng số <strong>' . $totalQuestions . '</strong> câu hỏi!</h2>';
            echo '</div>';
        } else {
            echo '<p class="text-danger text-center">Không có dữ liệu để xử lý!</p>';
        }
        ?>
        <div class="text-center back-button">
            <a href="index.php" class="btn btn-primary">Quay lạii</a>
        </div>
    </div>
</body>

</html>
