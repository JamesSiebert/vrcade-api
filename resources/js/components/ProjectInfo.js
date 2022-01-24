import React from 'react';
import ResponsiveAppBar from './ResponsiveAppBar';
import Footer from './Footer';
import { Alert, AlertTitle, Button, ButtonGroup, Container, Grid, Table, Typography } from '@mui/material';
import TableContainer from '@mui/material/TableContainer';
import Paper from '@mui/material/Paper';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import TableCell from '@mui/material/TableCell';
import TableBody from '@mui/material/TableBody';
import Box from '@mui/material/Box';

const techArray = [
    {id: 1, name:'Laravel (v8.80)'},
    {id: 2, name:'REST API (Laravel)'},
    {id: 3, name:'React v17'},
    {id: 4, name:'React Router 6'},
    {id: 5, name:'Material UI - React UI Library (v5.3)'},
    {id: 6, name:'Prettier'},
    {id: 7, name:'Axios'},
    {id: 8, name:'MySQL'},
    {id: 9, name:'MUI Themes'},
    {id: 10, name:'React Context, Props, State, Effects & more..'}
]





function ProjectInfo(props) {
    return (
        <>
            <ResponsiveAppBar />

            <Container>
                <Grid container spacing={3}>


                    <Grid item xs={12} sx={{ textAlign: 'center', mt: 10 }}>

                            <ButtonGroup variant="outlined" aria-label="outlined button group">
                                <Button size="large" href='https://github.com/JamesSiebert/vrcade-api' target='_blank'>API GitHub</Button>
                                <Button size="large" href='https://jamessiebert.itch.io/vrcade' target='_blank'>VRCADE Unity Project</Button>
                                <Button size="large" href='https://JamesSiebert.com' target='_blank'>James Siebert's Portfolio</Button>
                            </ButtonGroup>

                    </Grid>

                    <Grid item xs={12} sx={{ textAlign: 'center', mt: 3 }}>




                        <Box sx={{ pt: 2 }}>
                            <TableContainer component={Paper}>
                                <Table sx={{ minWidth: 650 }} aria-label=" scores table">
                                    <TableHead >
                                        <TableRow>
                                            <TableCell sx={{ color: 'text.secondary', fontSize: 24, fontWeight: 'medium' }} >Used in this project:</TableCell>
                                        </TableRow>
                                    </TableHead>
                                    <TableBody classes={{ root: 'table-body' }}>
                                        {techArray.map((row) => (
                                            <TableRow key={row.id} sx={{ '&:last-child td, &:last-child th': { border: 0 } }} >
                                                <TableCell component="th" scope="row">{row.name}</TableCell>
                                            </TableRow>
                                        ))}
                                    </TableBody>
                                </Table>
                            </TableContainer>
                        </Box>





                    </Grid>
                </Grid>
            </Container>

            <Footer />
        </>

    );
}

export default ProjectInfo;
