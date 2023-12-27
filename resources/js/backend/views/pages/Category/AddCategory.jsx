import { CCard, CCardBody, CCardHeader, CCol, CForm, CFormInput, CFormLabel, CFormTextarea, CRow } from '@coreui/react';
import React, { useState } from 'react';
import TagsInput from 'react-tagsinput';
import 'react-tagsinput/react-tagsinput.css'
import Seo from '../../seo/Seo';
import axios from 'axios';
import { toast } from 'react-toastify';
import Swal from 'sweetalert2';

const AddCategory = () => {
    const [category, setCategory] = useState({
        name: '',
        status: 1
    })
    


    
    const handleChange = (e) => {
        setCategory({
            ...category,
            [e.target.name]: e.target.value
        })
    }
    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('/api/category/add',category).then(response => {
            if(response.data.status === 200){
                toast.success(response.data.message,{
                    position: 'top-right'
                });
            }else if(response.data.status === 401){
                response.data.errors.forEach(el => toast.error(el,{
                    position: 'top-right'
                }))
            }else if(response.data.status === 402){
                Swal.fire('Error',response.data.message,'error')
            }else{
                Swal.fire('Error','Something went wrong. Please try again.','error')
            }
        })
    }
    
    return (
        <CRow>
            <CCol xs={12}>
                <CCard className="mb-4">
                <CCardHeader>
                    <strong>React Form Control</strong>
                </CCardHeader>
                <CCardBody>
                    <CForm onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <CFormLabel htmlFor="name">Name</CFormLabel>
                            <CFormInput
                                onChange={handleChange}
                                name='name'
                                value={category.name}
                                type="text"
                                id="name"
                                placeholder="Category Name"
                            />
                        </div>
                        <div className="mb-3">
                            <CFormLabel htmlFor="status">Status</CFormLabel>
                            <select value={category.status} name="status" className='form-control' id="status" onChange={handleChange}>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                        <br />
                        <div className="mb-3">
                            <CFormLabel><strong>SEO</strong></CFormLabel>
                        </div>
                        <Seo type="category" />
                        <div className="mb-3">
                            <button type='submit' className='btn btn-success text-white'>Submit</button>
                        </div>
                    </CForm>
                    
                </CCardBody>
                </CCard>
            </CCol>
        </CRow>
    );
};

export default AddCategory;