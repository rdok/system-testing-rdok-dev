pipeline {
    agent { label "linux" }
    triggers {
        cron('H * * * *')
        upstream(
            upstreamProjects: 'learning-react,practical-vim,rdok.dev,tic-tac-toe,practical-vim/practical-vim-website',
            threshold: hudson.model.Result.SUCCESS
        )
    }
    options { buildDiscarder( logRotator( numToKeepStr: '100' ) ) }
    stages {
        stage('Build') {
            steps { sh 'docker-compose run --rm codeception build' }
        }
        stage('Test') { steps {
            ansiColor('xterm') {
            sh 'docker-compose run --rm codeception build'
        } } }
    }
    post {
        failure {
            slackSend color: '#FF0000',
            message: "@here Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
            emailext attachLog: true,
            body: """<p>View console output at <a href='${env.BUILD_URL}/console'>
                ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>""",
            compressLog: true,
            recipientProviders: [[$class: 'DevelopersRecipientProvider']],
            subject: "Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }
        fixed {
            slackSend color: 'good',
            message: "@here Fixed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }
        success {
            slackSend message: "Stable: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }
        always {
            publishHTML([
            allowMissing: false,
            alwaysLinkToLastBuild: true,
            keepAll: false,
            reportFiles: 'report.html',
            reportName: 'Report',
            reportDir: '.'
            ])
        }
    }
}
