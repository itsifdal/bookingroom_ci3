module.exports = app => {
    const booking = require("../controllers/booking.controller.js");

    let router = require("express").Router();

    // Create a new post
    router.post("/", booking.create);

    // Retrieve all booking
    router.get("/", booking.getAll);

    // Retrieve single post
    router.get("/:kode_booking", booking.findOne);

    // Update post
    router.put("/:kode_booking", booking.update);

    // Delete single post
    router.delete("/:kode_booking", booking.delete);

    app.use("/api/booking", router);
}