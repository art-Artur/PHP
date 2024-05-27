const { DataTypes } = require('sequelize');
const sequelize = require('../config/database');
const Article = require('./articleModel');

const Comment = sequelize.define('Comment', {
  text: {
    type: DataTypes.TEXT,
    allowNull: false
  },
  author: {
    type: DataTypes.STRING,
    allowNull: false
  },
  articleId: {
    type: DataTypes.INTEGER,
    allowNull: false,
    references: {
      model: Article,
      key: 'id'
    }
  }
}, {
  timestamps: true
});

// Связь "один ко многим"
Article.hasMany(Comment, { foreignKey: 'articleId' });
Comment.belongsTo(Article, { foreignKey: 'articleId' });

module.exports = Comment;
