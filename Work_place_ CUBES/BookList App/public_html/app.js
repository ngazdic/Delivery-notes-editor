document.getElementById('book-form').addEventListener('submit', function (e) {
    e.preventDefault();

    let book = {
        title: document.getElementById('title').value.trim(),
        author: document.getElementById('author').value.trim(),
        isbn: document.getElementById('isbn').value,

        retrieveBooks: function () {
            var errorElement = document.getElementById('error');





            if (!this.title || !this.author || !this.isbn) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'Fields cannot be empty';
                return;
            }
            if (!isNaN(this.title)) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'Title cannot be a number';
                return;
            }
            if (this.title.length < 2) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'Title must have more than 1 character';
                return;
            }
            if (!isNaN(this.author)) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'Author cannot be a number';
                return;
            }
            if (this.author.length < 2) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'Author must have more than 1 character';
                return;
            }
            if (isNaN(this.isbn)) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'ISBN has to be a number';
                return;
            }
            if (this.isbn.length < 2) {
                errorElement.classList.add('error');
                errorElement.innerHTML = 'ISBN must have more than 1 number';
                return;
            }
            
            errorElement.classList.remove('error');
            errorElement.innerHTML = '';

            var tableBody = document.getElementById('book-list');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${this.title}</td>
                <td>${this.author}</td>
                <td>${this.isbn}</td>
                <td><button onclick="book.removeBook(event)" class="btn btn-danger btn-sm">Remove</button></td>
            `;
            tableBody.appendChild(newRow);


            document.getElementById('title').value = '';
            document.getElementById('author').value = '';
            document.getElementById('isbn').value = '';
        }

        //removeBook: function () {
        //ovo ne znam kako , probao sam ovo:
        /*
             removeBook: function () {
    var titleData = document.getElementById('title-data');
    var titleAuthor = document.getElementById('title-author');
    var titleIsbn = document.getElementById('title-isbn');
                    
    if (titleData) {
        titleData.remove();
    }
    if (titleAuthor) {
        titleAuthor.remove();
    }
    if (titleIsbn) {
        titleIsbn.remove();
    }
}
         */
        //}
    };

    book.retrieveBooks();
});