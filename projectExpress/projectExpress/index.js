const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const articleRoutes = require("./routes/articleRoutes");
const authorRoutes = require("./routes/authorRoutes");
const commentRoutes = require("./routes/commentRoutes");
const sequelize = require("./config/database");
const methodOverride = require('method-override');

app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));
app.use(methodOverride('_method'));

app.use("/articles", articleRoutes);
app.use("/authors", authorRoutes);
app.use(commentRoutes);

const PORT = process.env.PORT || 4000;

sequelize
  .sync({ force: false })
  .then(() => {
    app.listen(PORT, () => {
      console.log(`Server is running on port ${PORT}`);
    });
  })
  .catch((error) => {
    console.error("Unable to connect to the database:", error);
  });
