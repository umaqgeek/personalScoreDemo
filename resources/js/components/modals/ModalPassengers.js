import React, { Component } from 'react';
import Modal from 'react-responsive-modal';

import { getSqlErrors } from '../../utilities/Errors';

class ModalPassengers extends Component {
  constructor(props) {
    super(props);

    this.state = {
      batch_id: this.props.batchId,
      passengers: this.props.passengers,
      errorMessage: '',
    };
  };

  render() {

    let contact = '';
    if (this.props.isFooter) {
      contact = (
        <div className='mt-5'>{this.props.isFooter}</div>
      );
    }

    return (
      <Modal
        open={this.props.open}
        onClose={this.props.onCloseModal}
        center
      >
        <div className='container py-4' style={{width: '600px'}}>

          <h3>Batch #{this.props.batchNumber}</h3>

          <center>

            <table className='table table-bordered'>
              <thead>
                <tr>
                  <td><strong>No.</strong></td>
                  <td><strong>Name</strong></td>
                  <td><strong>Type</strong></td>
                </tr>
              </thead>
              <tbody>
                {this.props.passengers.map(function(p, index) {
                  return (
                    <tr>
                      <td>{index+1}.</td>
                      <td>{p.users.name.toUpperCase()}</td>
                      <td>{p.type.toUpperCase()}</td>
                    </tr>
                  );
                })}
              </tbody>
            </table>

            {this.state.errorMessage}

            {contact}
          </center>
        </div>
      </Modal>
    );
  };
};

export default ModalPassengers;
