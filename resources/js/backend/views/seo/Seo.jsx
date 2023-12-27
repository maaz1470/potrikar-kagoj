import { CFormInput, CFormLabel, CFormTextarea } from '@coreui/react';
import React from 'react';

const Seo = () => {
    return (
        <div>
            <div className="mb-3">
                <CFormLabel htmlFor="meta_title">Meta Title</CFormLabel>
                <CFormInput
                    name='title'
                    type="text"
                    id="meta_title"
                    placeholder="Meta Title"
                />
            </div>
            <div className="mb-3">
                <CFormLabel htmlFor="meta_title">Meta Description</CFormLabel>
                <CFormTextarea name='description' id='meta_title' placeholder='Meta Description' />
            </div>
            <div className="mb-3">
                <CFormLabel htmlFor="meta_title">Keywords</CFormLabel>
                {/* <TagsInput value={seo.keywords} onChange={handleTagsChange} /> */}
            </div>
        </div>
    );
};

export default Seo;