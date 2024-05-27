const { DataTypes } = require("sequelize");
const sequelize = require("../config/database");
const Author = require("./authorModel");

const Article = sequelize.define(
  "Article",
  {
    title: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    text: {
      type: DataTypes.TEXT,
      allowNull: false,
    },
    authorId: {
      type: DataTypes.INTEGER,
      allowNull: false,
      references: {
        model: Author,
        key: "id",
      },
    },
  },
  {
    tableName: "articles",
    timestamps: true,
  }
);

Author.hasMany(Article, { foreignKey: "authorId" });
Article.belongsTo(Author, { foreignKey: "authorId" });

module.exports = Article;
