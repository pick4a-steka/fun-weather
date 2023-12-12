var commentList = document.getElementById('LIST');

function loadComments() {
    // функция заглушка
}

// Функция для добавления нового комментария
function addComment(comment_username, comment_comment_text, comment_created_at) {
    var newComment = document.createElement('li');
    newComment.className = 'comment';

    var blockElement = document.createElement('div');
    blockElement.className = 'left-block';

    var userElement = document.createElement('div');
    userElement.className = 'user';
    userElement.textContent = comment_username;

    var textElement = document.createElement('div');
    textElement.className = 'comment-text';
    textElement.textContent = comment_comment_text;

    var timestampElement = document.createElement('div');
    timestampElement.className = 'timestamp';
    timestampElement.textContent = comment_created_at;

    blockElement.appendChild(userElement); // Добавить userElement к left-block
    blockElement.appendChild(timestampElement); // Добавить timestampElement к left-block

    newComment.appendChild(blockElement); // Добавить left-block к comment
    newComment.appendChild(textElement); // Добавить textElement к comment

    commentList.appendChild(newComment);
}

// Запрос к серверу для получения комментариев
fetch('comments_php.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(comment => {
            addComment(comment.username, comment.comment_text, comment.created_at);
        });
    })
    .catch(error => {
        console.error('Error fetching comments:', error);
    });

console.log(commentList);

// Вызовите функцию при загрузке страницы
document.addEventListener('DOMContentLoaded', loadComments);