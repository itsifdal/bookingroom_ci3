const db        = require("../models");
const Ruangan   = db.ruangan;
const Op        = db.Sequelize.Op;

// Create and Save a new Category
exports.create = (req, res) => {
    // Validate request
    if (!req.body.nama_ruangan) {
        res.status(400).send({
            message: "Content can not be empSDty!"
        });
        return ;
    }

    // Tambah Ruangan
    const ruangan = {
        kode_ruangan: req.body.kode_ruangan,
        status: req.body.status,
        nama_ruangan: req.body.nama_ruangan
    };

    // Save ke database
    Ruangan.create(ruangan)
        .then((data) => {
            res.send(data);
        }).catch((err) => {
            res.status(500).send({
                message:
                    err.message || "Error Tambah Ruangan."
            })
        });
};

// Retrieve all Categorys from the database.
exports.getAll = (req, res) => {
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
    const kode_ruangan = req.params.kode_ruangan;

    Ruangan.findByPk(kode_ruangan)
        .then((data) => {
            res.send({
                success: true,
                message: 'Data berhasil di tampilkan',
                data: data
            });
        }).catch((err) => {
            res.status(500).send({
                message: "Error retrieving Category with id=" + kode_ruangan
            });
        });
};

// Update a Category by the id in the request
exports.update = (req, res) => {
    const kode_ruangan = req.params.kode_ruangan;

    Ruangan.update(req.body, {
        where: { kode_ruangan: kode_ruangan }
    }).then((result) => {
        if ( result == 1 ) {
            res.send({
                message: "Category was updated successfully"
            });
        } else {
            res.send({
                message: `Cannot update Category with id=${kode_ruangan}.`
            })
        }
    }).catch((err) => {
        res.status(500).send({
            message: "Error updating Ruangan with kode=" + kode_ruangan
        })
    });
};

// Delete a Category with the specified id in the request
exports.delete = (req, res) => {
    const kode_ruangan = req.params.kode_ruangan;
    alert('kode_ruangan');

    Ruangan.destroy({
        where: { kode_ruangan: kode_ruangan }
    }).then((result) => {
        if (result == 1) {
            res.send({
                message: "Ruangan dihapus"
            })
        } else {
            res.send({
                message: `Cannot delete Category with kode=${kode_ruangan}`
            })
        }
    }).catch((err) => {
        res.status(500).send({
            message: "Could not delete Category with kode=" + kode_ruangan
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