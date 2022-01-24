import React, { useState } from 'react';
import { BrowserRouter, Routes, Route} from 'react-router-dom';
import axios from 'axios';
import Home from './Home';
import CreditsList from './CreditsList';
import CheckinsList from './CheckinsList';
import { CssBaseline } from '@mui/material';
import { ThemeProvider } from '@emotion/react';
import { darkTheme } from '../../../themes/darkTheme.js'
import ProjectInfo from './ProjectInfo';
import ScoresList from './ScoresList';

export const AppContext = React.createContext();

function App() {
    const [scores, setScores] = useState(sampleScores);
    const [credits, setCredits] = useState(sampleCredits);
    const [checkins, setCheckins] = useState(sampleCheckins);

    const appContextValue = {
        handleGetScores,
        handleGetCredits,
        handleGetCheckins,
    };

    function handleGetScores() {
        axios.get('/api/scores').then((response) => {
            setScores(response.data);
            console.log(response.data);
        });
    }

    function handleGetCredits() {
        axios.get('/api/credits').then(response => {
            setCredits(response.data);
            console.log(response.data);
        })
    }

    function handleGetCheckins() {
        axios.get('/api/checkins').then(response => {
            setCheckins(response.data);
            console.log(response.data);
        })
    }

    return (
        <ThemeProvider theme={darkTheme}>
            <CssBaseline />
            <AppContext.Provider value={appContextValue}>
                <BrowserRouter>
                    <Routes>
                        <Route path="/" element={<Home />} />
                        <Route path="/scores-list" element={<ScoresList scores={scores} />} />
                        <Route path="/credits-list" element={<CreditsList credits={credits} />} />
                        <Route path="/checkins-list" element={<CheckinsList checkins={checkins} />} />
                        <Route path="/project-info" element={<ProjectInfo />} />
                    </Routes>
                </BrowserRouter>
            </AppContext.Provider>
        </ThemeProvider>
    );
}

const sampleScores = [
    {
        id: 1,
        player_id: 'LOADING...',
        room_id: '',
        score: 10,
        created_at: '',
        updated_at: '',
    },
];

const sampleCredits = [
    {
        id: 1,
        player_id: 'LOADING...',
        amount: 0,
        created_at: '',
        updated_at: '',
    },
];

const sampleCheckins = [
    {
        id: 1,
        player_id: 'LOADING...',
        room_id: '',
        created_at: '',
        updated_at: '',
    },
];

export default App;
