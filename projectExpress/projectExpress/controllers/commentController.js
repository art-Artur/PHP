const Comment = require('../models/commentModel');
const Article = require('../models/articleModel');

exports.createComment = async (req, res) => {
  try {
    const { text, author } = req.body;
    const articleId = req.params.articleId;
    const comment = await Comment.create({ text, author, articleId });
    res.redirect(`/articles/${articleId}`);
  } catch (error) {
    console.error('Error creating comment:', error);
    res.status(500).send('Internal Server Error');
  }
};
