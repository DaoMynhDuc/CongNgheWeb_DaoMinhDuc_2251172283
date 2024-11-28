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
            // Đường dẫn tới file TXT
            $filePath = "quiz.txt"; // Đổi tên file nếu cần

            if (file_exists($filePath)) {
                // Đọc file và phân tách nội dung
                $content = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $currentQuestion = "";
                $currentOptions = [];
                $answer = "";
                $questionIndex = 1;

                foreach ($content as $line) {
                    if (strpos($line, "ANSWER:") === 0) {
                        // Đây là câu trả lời đúng
                        $answer = trim(str_replace("ANSWER:", "", $line));

                        // Hiển thị câu hỏi và các tùy chọn
                        echo '<div class="question">';
                        echo '<p><strong>Câu hỏi ' . $questionIndex . ':</strong> ' . htmlspecialchars($currentQuestion) . '</p>';
                        echo '<div class="options">';
                        foreach ($currentOptions as $key => $option) {
                            $optionKey = chr(65 + $key); // A, B, C, D
                            echo '<div class="form-check">';
                            echo '<input class="form-check-input" type="radio" name="answer[' . $questionIndex . ']" id="q' . $questionIndex . $optionKey . '" value="' . $optionKey . '">';
                            echo '<label class="form-check-label" for="q' . $questionIndex . $optionKey . '">' . htmlspecialchars($option) . '</label>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '<input type="hidden" name="correct_answer[' . $questionIndex . ']" value="' . htmlspecialchars($answer) . '">';
                        echo '</div>';

                        // Reset cho câu hỏi tiếp theo
                        $currentQuestion = "";
                        $currentOptions = [];
                        $questionIndex++;
                    } elseif (preg_match('/^[A-D]\./', $line)) { // Kiểm tra tùy chọn (A., B., C., D.)
                        $currentOptions[] = substr($line, 2); // Loại bỏ "A. ", "B. ", ...
                    } else {
                        $currentQuestion .= $line . " ";
                    }
                }
            } else {
                echo "<p>Không tìm thấy file câu hỏi!</p>";
            }
            ?>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Nộp bài</button>
            </div>
        </form>

    </div>
</body>

</html>
