import React from 'react';
import { Button, Container, Grid, Typography } from '@mui/material';

import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import { CardActionArea } from '@mui/material';

import ResponsiveAppBar from './ResponsiveAppBar';
import Footer from './Footer';

const Home = () => {
    return (
        <>
            <ResponsiveAppBar />

            <Container>
                <Grid container spacing={3}>
                    <Grid item xs={12}>
                        <Grid container spacing={2} sx={{ mb: 2, pt:5}}>
                            <Grid item xs={12}>
                                <Typography align='center' variant="h2" component="div">
                                    VRCADE REST API
                                </Typography>
                            </Grid>
                            <Grid item xs={12}>
                                <Typography variant="body2" align='center'>
                                    This is a side project to the Unity VRCADE project. This REST API is used to view and download the data created by the VRCADE VR Unity Project.
                                </Typography>
                            </Grid>

                        </Grid>
                    </Grid>
                </Grid>

                <Grid container spacing={3} sx={{pt:5}}>
                    <Grid item xs={12} md={4}>
                        <Card sx={{ maxWidth: 345 }}>
                            <CardActionArea>
                                <CardMedia
                                    component="img"
                                    height="140"
                                    image="/static/images/credit.jpg"
                                    alt="credit"
                                />
                                <CardContent>
                                    <Typography gutterBottom variant="h5" component="div">
                                        Account Credits
                                    </Typography>
                                    <Typography variant="body2" color="text.secondary">
                                        This API reliably handles the account credits for all players within this virtual reality multiplayer game.
                                    </Typography>
                                </CardContent>
                            </CardActionArea>
                        </Card>
                    </Grid>

                    <Grid item xs={12} md={4}>
                        <Card sx={{ maxWidth: 345 }}>
                            <CardActionArea>
                                <CardMedia
                                    component="img"
                                    height="140"
                                    image="/static/images/score.jpg"
                                    alt="score"
                                />
                                <CardContent>
                                    <Typography gutterBottom variant="h5" component="div">
                                        Score Tracking
                                    </Typography>
                                    <Typography variant="body2" color="text.secondary">
                                        This API enables the tracking of player scores. This data is used players their scores and the top scores of a specific game.
                                    </Typography>
                                </CardContent>
                            </CardActionArea>
                        </Card>
                    </Grid>

                    <Grid item xs={12} md={4}>
                        <Card sx={{ maxWidth: 345 }}>
                            <CardActionArea>
                                <CardMedia
                                    component="img"
                                    height="140"
                                    image="/static/images/analytics.jpg"
                                    alt="analytics"
                                />
                                <CardContent>
                                    <Typography gutterBottom variant="h5" component="div">
                                        Player Time Tracker
                                    </Typography>
                                    <Typography variant="body2" color="text.secondary">
                                        Through the use of the ping based time tracking system this API can be used to track the time each player spends in a specific are of the game.
                                    </Typography>
                                </CardContent>
                            </CardActionArea>
                        </Card>
                    </Grid>
                </Grid>

                <Grid container spacing={3}>
                    <Grid item xs={12} sx={{ textAlign: 'center', mt: 3 }}>
                        <Button href="https://jamessiebert.itch.io/vrcade" target="_blank" variant="outlined" size="large">
                            VRCADE Unity Project
                        </Button>
                    </Grid>
                </Grid>

            </Container>
            <Footer />
        </>
    );
};

export default Home;

