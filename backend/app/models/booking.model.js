/**
 * These columns will be generated automatically: 
 * id, title, description, published, createdAt, updatedAt.
 * create a new Post: create(object)
 * find a Post by id: findByPk(id)
 * get all Posts: findAll()
 * update a Post by id: update(data, where: { id: id })
 * remove a Post: destroy(where: { id: id })
 * remove all Posts: destroy(where: {})
 * find all Posts by title: findAll({ where: { title: ... } })
 * These functions will be used in our Controller.
 */
module.exports = (sequelize, Sequelize) => {
    const Booking = sequelize.define("booking", {
        id_booking: {
            type: Sequelize.STRING,
            primaryKey: true
        },
        kode_ruangan: {
            type: Sequelize.STRING
        },
        id_user: {
            type: Sequelize.STRING
        },
        no_booking: {
            type: Sequelize.STRING
        },
        agenda: {
            type: Sequelize.STRING
        },
        date: {
            type: Sequelize.STRING
        },
        time_start: {
            type: Sequelize.STRING
        },
        time_end: {
            type: Sequelize.STRING
        }
    });
    
    return Booking;
}