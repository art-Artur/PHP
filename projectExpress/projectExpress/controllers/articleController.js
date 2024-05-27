const Article = require('../models/articleModel');
const Comment = require('../models/commentModel');
const Author = require('../models/authorModel');

exports.getAllArticles = async (req, res) => {
  try {
    const articles = await Article.findAll({ include: Author });
    res.render('articles', { articles });
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};

exports.showNewArticleForm = (req, res) => {
  res.render('newArticle');
};

exports.createArticle = async (req, res) => {
  try {
    const { title, text, author } = req.body;
    let authorRecord = await Author.findOne({ where: { name: author } });
    if (!authorRecord) {
      authorRecord = await Author.create({ name: author });
    }
    const newArticle = await Article.create({ title, text, authorId: authorRecord.id });
    res.redirect(`/articles/${newArticle.id}`);
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};

exports.getArticleById = async (req, res) => {
  try {
    const articleId = req.params.id;
    const article = await Article.findByPk(articleId, {
      include: [{ model: Author }, { model: Comment }],
    });
    if (article) {
      res.render('article', { article });
    } else {
      res.status(404).send("Article not found");
    }
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};

exports.showEditArticleForm = async (req, res) => {
  try {
    const articleId = req.params.id;
    const article = await Article.findByPk(articleId, {
      include: [Author]
    });
    if (article) {
      res.render('editArticle', { article });
    } else {
      res.status(404).send("Article not found");
    }
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};

exports.updateArticle = async (req, res) => {
  try {
    const articleId = req.params.id;
    const { title, text, author } = req.body;
    let authorRecord = await Author.findOne({ where: { name: author } });
    if (!authorRecord) {
      authorRecord = await Author.create({ name: author });
    }
    const article = await Article.findByPk(articleId);
    if (article) {
      article.title = title;
      article.text = text;
      article.authorId = authorRecord.id;
      await article.save();
      res.redirect(`/articles/${article.id}`);
    } else {
      res.status(404).send("Article not found");
    }
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};

exports.deleteArticle = async (req, res) => {
  try {
    const articleId = req.params.id;
    await Comment.destroy({ where: { articleId } });
    await Article.destroy({ where: { id: articleId } });
    res.redirect('/articles');
  } catch (error) {
    res.status(500).send("Internal Server Error");
  }
};
