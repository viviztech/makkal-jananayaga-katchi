<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookReaderController extends Controller
{
    /**
     * Display the e-book reader page
     *
     * @param string $book
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function read($book)
    {
        $book = Book::active()
            ->where('slug', $book)
            ->firstOrFail();

        // Check if e-book is available
        if (!$book->isEbookAvailable()) {
            return redirect()->route('books')
                ->with('error', __('E-book is not available for this book.'));
        }

        // Check if file exists
        if (empty($book->ebook_file_url)) {
            return redirect()->route('books')
                ->with('error', __('E-book file not found.'));
        }

        return view('pages.book-reader', compact('book'));
    }
}
