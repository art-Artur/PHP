const Author = require('../models/authorModel');
const Article = require('../models/articleModel');

exports.getAllAuthors = async (req, res) => {
  try {
    const authors = await Author.findAll();
    res.render('authors', { authors });
  } catch (error) {
    res.status(500).send('Internal Server Error');
  }
};

exports.getArticlesByAuthor = async (req, res) => {
  try {
    const author = await Author.findByPk(req.params.id, {
      include: [Article]
    });
    if (author) {
      res.render('authorArticles', { author, articles: author.Articles });
    } else {
      res.status(404).send('Author not found');
    }
  } catch (error) {
    res.status(500).send('Internal Server Error');
  }
};
