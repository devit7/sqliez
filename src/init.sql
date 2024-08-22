CREATE TABLE IF NOT EXISTS book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_date VARCHAR(255) NOT NULL,
    img_url VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL
);

INSERT INTO book (title, author, published_date, type) VALUES 
('The Great Gatsby', 'F. Scott Fitzgerald', '1925', 'https://upload.wikimedia.org/wikipedia/id/2/26/TheGreatGatsby2012Poster.jpg','Fiction', 'show'),
('The Catcher in the Rye', 'J.D. Salinger', '1951', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/The_Catcher_in_the_Rye_%281951%2C_first_edition_cover%29.jpg/640px-The_Catcher_in_the_Rye_%281951%2C_first_edition_cover%29.jpg','Fiction', 'show'),
('To Kill a Mockingbird', 'Harper Lee', '1960', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg/1200px-To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg' ,'Fiction', 'show'),
('1984', 'George Orwell', '1949', 'https://covers.storytel.com/jpg-640/9781398805941.18242d30-cde4-4703-8b05-f3bc77949c95?optimize=high','Fiction', 'show'),
('Pride and Prejudice', 'Jane Austen', '1813', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4WHL1HbGeR71LOB2Tq3qufIcxqe_61FL85Q&s','Fiction', 'show'),
('The Diary of Princess Pushy', 'Samantha Markle', '2019', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1609694005i/56531196.jpg','Non-Fiction', 'show'),
('The Art of War', 'Sun Tzu', '5th Century BC', 'https://ebooks.gramedia.com/ebook-covers/34013/image_highres/ID_GPU2016MTH08TAOWMSTPASZ.jpg','Non-Fiction', 'show'),
('The Prince', 'Niccolò Machiavelli', '1532', 'https://m.media-amazon.com/images/I/61UegkaetIL._AC_UF1000,1000_QL80_.jpg','Non-Fiction', 'show'),
('The Republic', 'Plato', '380 BC', 'http://img-host-by-dev.vercel.app/img/ayangKu/kbfwau2918hf2b3jk839fui2uf891_SIGMA{sql1_t00_3z}.jpg','Non-Fiction', 'hide'),
