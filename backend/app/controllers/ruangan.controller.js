const db        = require("../models");
const Ruangan   = db.ruangan;
const Op        = db.Sequelize.Op;

// Create and Save a new Category
exports.create = (req, res) => {
    // Validate request
    if (!req.body.name) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
        return ;
    }

    // Create a Category
    const ruangan = {
        name: req.body.name,
        image: req.body.image,
        description: req.body.description
    };

    // Save Ruangan in the database
    Ruangan.create(ruangan)
        .then((data) => {
            res.send(data);
        }).catch((err) => {
            res.status(500).send({
                message:
                    err.message || "Error Creat Ruangan."
            })
        });
};

// Retrieve all Categorys from the database.
exports.findAll = (req, res) => {
    const kode_ruangan = req.query.kode_ruangan;
    let condition = kode_ruangan ? { kode_ruangan: { [Op.like]: `%${kode_ruangan}%` } } : null;

    Ruangan.findAll({ where: condition })
        .then((data) => {
            res.send({
                success: true,
                message: 'List Ruangan ditampilkan',
                data: data
            });
        }).catch((err) => {
            res.status(500).send({
                message:
                    err.message || "Eror Menampilkan Data Ruangan"
            });
        });
};

// Find a single Category with an id
exports.findOne = (req, res) => {
    const id = req.params.id;

    Category.findByPk(id)
        .then((data) => {
            res.send({
                success: true,
                message: 'Data berhasil di tampilkan',
                data: data
            });
        }).catch((err) => {
            res.status(500).send({
                message: "Error retrieving Category with id=" + id
            });
        });
};

// Update a Category by the id in the request
exports.update = (req, res) => {
    const id = req.params.id;

    Category.update(req.body, {
        where: { id: id }
    }).then((result) => {
        if ( result == 1 ) {
            res.send({
                message: "Category was updated successfully"
            });
        } else {
            res.send({
                message: `Cannot update Category with id=${id}.`
            })
        }
    }).catch((err) => {
        res.status(500).send({
            message: "Error updating Category with id=" + id
        })
    });
};

// Delete a Category with the specified id in the request
exports.delete = (req, res) => {
    const id = req.params.id;

    Category.destroy({
        where: { id: id }
    }).then((result) => {
        if (result == 1) {
            res.send({
                message: "Category was deleted successfully"
            })
        } else {
            res.send({
                message: `Cannot delete Category with id=${id}`
            })
        }
    }).catch((err) => {
        res.status(500).send({
            message: "Could not delete Category with id=" + id
        })
    });
};

// Delete all Categorys from the database.
exports.deleteAll = (req, res) => {
    Category.destroy({
        where: {},
        truncate: false
    }).then((result) => {
        res.send({
            message: `${result} Categorys were deleted successfully!`
        });
    }).catch((err) => {
        res.status(500).send({
            message: 
                err.message || "Some error occurred while removing all Categorys."
        });
    });

};

// Find all published Categorys
exports.findAllPublished = (req, res) => {
    Category.findAll({
        where: { published: true }
    }).then((result) => {
        res.send(result);
    }).catch((err) => {
        res.status(500).send({
            message:
                err.message || "Some error occured retrieving Categorys"
        })
    });
};