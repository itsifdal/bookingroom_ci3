module.exports = app => {
    const ruangan = require("../controllers/ruangan.controller.js");

    let router = require("express").Router();

    // Create a new post
    router.post("/", ruangan.create);

    // Retrieve all ruangan
    router.get("/", ruangan.getAll);

    // Retrieve single post
    router.get("/:kode_ruangan", ruangan.findOne);

    // Update post
    router.put("/:kode_ruangan", ruangan.update);

    // Delete single post
    router.delete("/:kode_ruangan", ruangan.delete);

    app.use("/api/ruangan", router);
}