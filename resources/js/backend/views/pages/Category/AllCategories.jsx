import React from 'react'
import {
  CCard,
  CCardBody,
  CCardHeader,
  CCol,
  CRow,
  CTable,
  CTableBody,
  CTableCaption,
  CTableDataCell,
  CTableHead,
  CTableHeaderCell,
  CTableRow,
} from '@coreui/react'
import { DocsExample } from './../../../components'
import { Link } from 'react-router-dom';
const AllCategories = () => {
    return (
        <CRow>
            <CCol xs={12}>
                <CCard className="mb-4">
                <CCardHeader className='d-flex justify-content-between'>
                    <div>
                        <strong>Categories</strong>
                    </div>
                    <div>
                        <Link to="/category/add" className='btn btn-success text-white'>Add Category</Link>
                    </div>
                </CCardHeader>
                <CCardBody>
                    <CTable>
                        <CTableHead>
                            <CTableRow>
                                <CTableHeaderCell scope="col">#</CTableHeaderCell>
                                <CTableHeaderCell scope="col">Class</CTableHeaderCell>
                                <CTableHeaderCell scope="col">Heading</CTableHeaderCell>
                                <CTableHeaderCell scope="col">Heading</CTableHeaderCell>
                            </CTableRow>
                        </CTableHead>
                        <CTableBody>
                            <CTableRow>
                                <CTableHeaderCell scope="row">1</CTableHeaderCell>
                                <CTableDataCell>Mark</CTableDataCell>
                                <CTableDataCell>Otto</CTableDataCell>
                                <CTableDataCell>@mdo</CTableDataCell>
                            </CTableRow>
                        </CTableBody>
                    </CTable>
                </CCardBody>
                </CCard>
            </CCol>
        </CRow>
    );
};

export default AllCategories;