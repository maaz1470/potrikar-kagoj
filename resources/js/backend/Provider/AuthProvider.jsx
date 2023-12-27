import axios from 'axios'
import React, { createContext, useEffect, useState } from 'react'

export const AuthContext = createContext(null)

const AuthProvider = ({ children }) => {
    const [auth, setAuth] = useState(false)
    const [loading, setLoading] = useState(true)
    const checkUser = async () => {
        await axios.get('/api/checkAuth').then(response => {
            setLoading(false)
            if(response.data.status === 200){
                setAuth(true)
            }else{
                setAuth(false)
            }
        }).catch(error => {
            setAuth(false)
            setLoading(false)
        })
    }

    useEffect(() => {
        const user = checkUser();
        return () => user();
    },[])

    const userInfo = {
        auth,
        loading,
        checkUser
    }
    return (
        <AuthContext.Provider value={userInfo}>
            {children}
        </AuthContext.Provider>
    );
}

export default AuthProvider
