module.exports = app => {
    const category = require("../controllers/category.controller.js");

    let router = require("express").Router();

    // Create a new post
    router.post("/", category.create);

    // Retrieve all category
    router.get("/", category.findAll);

    // Retrieve single post
    router.get("/:id", category.findOne);

    // Update post
    router.put("/:id", category.update);

    // Delete single post
    router.delete("/:id", category.delete);

    // Delete all category
    router.delete("/", category.deleteAll);

    app.use("/api/category", router);
}